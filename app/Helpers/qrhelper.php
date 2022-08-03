<?php

use App\Models\Certificates\Certificate;
use App\Models\Certificates\CertificateFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManager;
use setasign\Fpdi\Fpdi;

// function processImage()
// {
//     // $pdf = new Fpdi();
//     // $pdf->AddPage();
//     // $pdf->setSourceFile(public_path() . '/storage/certificates/certificate.pdf');
//     // $tplId = $pdf->importPage(1);
//     // $pdf->useTemplate($tplId);
//     // $pdf->Image(public_path() . '/admin_assests/img/logo.png', 0, 0, 0, 0);
//     // dd($pdf->Output());



//     // $image = Image::make(storage_path('app/' . $output_file));
//     // dd($image);
//     // Storage::disk('local')->put($output_file, $image);

//     // dd($image);

//     // $cerificate_image = $file->getFile($certificate->certificate_no);
//     // $merged_image = mergeImages($qr, $cerificate_image, $file->path);
//     // dd($merged_image);
// }
function processImage(Certificate $certificate, CertificateFile $file)
{
    $time = time();
    $qr = generateQRCode($certificate->slug, $time);
    $cerificate_image = $file->getFile($certificate->certificate_no);
    $merged_image = mergeImages($qr, $cerificate_image, $file->path);
    dd($merged_image);
}

function generateQRCode($slug, $time)
{
    $output_file = '/qr-code/img-' . $time . '.png';
    // $certificate = Certificate::whereSlug($string)->firstOrFail();
    $url = URL::to(route('certificate.view', $slug));
    $qrString = QrCode::size(300)->format('png')->generate($url);
    Storage::disk('public')->put($output_file, $qrString);
    return asset('storage'.$output_file );
}

function mergeImages($qr, $cerificate, $name)
{
    $imageManager = new ImageManager();
    $img_canvas = $imageManager->canvas(800, 400);
    return Image::make($qr);
}
