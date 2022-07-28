<?php

use App\Models\Certificates\Certificate;
use App\Models\Certificates\CertificateFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManager;
use setasign\Fpdi\Fpdi;
use SVG\SVG;

function processImage()
{
    // $pdf = new Fpdi();
    // $pdf->AddPage();
    // $pdf->setSourceFile(public_path() . '/storage/certificates/certificate.pdf');
    // $tplId = $pdf->importPage(1);
    // $pdf->useTemplate($tplId);
    // $pdf->Image(public_path() . '/admin_assests/img/logo.png', 0, 0, 0, 0);
    // dd($pdf->Output());

    $file = CertificateFile::find(1);
    $certificate = Certificate::find(1);
    $qrString  = generateQRCode($certificate->slug);


    $time = time();
    $output_file = '/public/temp/qr-code/img-' . $time . '.svg';
    Storage::disk('local')->put($output_file, $qrString  );

    // $file = SVG::fromFile(storage_path('app/' . $output_file));

    // $output_file = '/public/qr-code/img-' . $time . '.png';
    // $image = Image::make(storage_path('app/' . $output_file));
    // dd($image);
    // Storage::disk('local')->put($output_file, $image);

    // dd($image);

    // $cerificate_image = $file->getFile($certificate->certificate_no);
    // $merged_image = mergeImages($qr, $cerificate_image, $file->path);
    // dd($merged_image);
}
// function processImage(Certificate $certificate, CertificateFile $file)
// {
//     $qr = generateQRCode($certificate->slug);
//     $cerificate_image = $file->getFile($certificate->certificate_no);
//     $merged_image = mergeImages($qr, $cerificate_image, $file->path);
//     dd($merged_image);
// }

function generateQRCode($string)
{
    $certificate = Certificate::whereSlug($string)->firstOrFail();
    $url = URL::to(route('certificate.view', $string));
    return QrCode::size(300)->format('png')->generate($url);
}

function mergeImages($qr, $cerificate, $name)
{
    $imageManager = new ImageManager();
    $img_canvas = $imageManager->canvas(800, 400);
    return Image::make($qr);
}
