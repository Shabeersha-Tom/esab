<?php

use App\Models\Certificates\Certificate;
use App\Models\Certificates\CertificateFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\ImageManager;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Str;
use Spatie\PdfToImage\Pdf;


function processManualUpload(Certificate $certificate, CertificateFile $file)
{
}

function processAutoUpload(Certificate $certificate, CertificateFile $file, $position)
{
    $time = time();
    $qr = generateQRCode($certificate->slug, $time);
    $cerificate_image = $file->getFilePath($certificate->certificate_no);
    mergeImages($qr, $cerificate_image, $file->path, $position);
    cleanFiles($time);
    return true;
}

function generateQRCode($slug, $time)
{
    $output_file = 'qr-code/img-' . $time . '.png';
    $url = URL::to(route('certificate.view', $slug));
    $qrString = QrCode::size(150)->backgroundColor(255, 255, 255, 0)->format('png')->generate($url);
    Storage::disk('public')->put($output_file, $qrString);
    return  Storage::disk('public')->path($output_file);
}

function mergeImages($qr, $cerificate, $name, $position)
{
    $time = time();
    $pdf = new Fpdi();
    $pdf->AddPage();
    $pdf->setSourceFile($cerificate);
    $tplId = $pdf->importPage(1);
    $pdf->useTemplate($tplId);

    $x = 0;
    $y = 0;

    if ($position == 'top_left' || $position == 'top_right') {
        $x = 145;
        $y = 30;
    } else if ($position == 'bottom_left') {
        $x = 14;
        $y = 245;
    } else if ($position == 'bottom_right') {
        $x = 160;
        $y = 245;
    }

    $pdf->Image($qr, $x, $y, 0, 0);
    $pdf->Output('F', $cerificate);

    // $imageManager = new ImageManager();
    // $img_canvas = $imageManager->canvas(800, 400);
    // return Image::make($qr);
}

function cleanFiles($time)
{
    $output_file = "public/qr-code/img-" . $time . ".png";
    if (Storage::exists($output_file)) {
        Storage::delete($output_file);
    } else {
        dd($output_file);
    }
}

function convertPdfToImage(Certificate $certificate, CertificateFile $file)
{
    $fileName = basename($file->path, '.pdf') . '.jpg';
    $image_path = public_path('pdfImages/' . $certificate->certificate_no . $fileName);
    $pdf = new Pdf($file->getFilePath($certificate->certificate_no));
    $pdf->saveImage($image_path);
    return $image_path;
}
