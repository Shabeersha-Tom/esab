<?php

namespace App\Listeners;

use App\Models\Certificates\CertificateFile;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $certificates = Auth::user()->certificate()->where('status', 0)->with('file')->get();
        foreach ($certificates as $certificate) {
            $file = $certificate->file->getFileStoragePath($certificate->certificate_no);
            deleteFile($file);
            $certificate->file->delete();
            $certificate->delete();
        }

        if (Auth::user()->isA('superadmin')) {
            $certificate_files = CertificateFile::where('status', 'draft')
                ->where('certificate_no', NULL)
                ->where('created_at', '<', Carbon::parse('-24 hours'))
                ->get();
            foreach ($certificate_files as $file) {
                $fileName = 'public/temp/' . $file->path;
                if (Storage::exists($fileName)) {
                    Storage::delete($fileName);
                }
                $file->delete();
            }

            $folderName = 'public/certificates/';
            $directories = Storage::directories($folderName);
            foreach ($directories as $dir) {
                $full_path = Storage::path($dir);
                $files = Storage::allFiles($dir);
                if (is_dir($full_path) && empty($files)) {
                    Storage::deleteDirectory($dir);
                }
            }

        }
    }
}
