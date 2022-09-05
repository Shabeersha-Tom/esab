<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function getAdminAsset($asset)
{
    return asset('admin_assests/' . $asset);
}


function clean($string, $replace = '-')
{
    $string = str_replace(' ', $replace, $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function uploadImage(Request $request, $input, $path)
{
    if ($request->hasFile($input)) {

        $uploadedFile = $request->file($input);
        $filename =   time() . $uploadedFile->getClientOriginalName();

        $name = Storage::disk('public')->putFileAs(
            $path,
            $uploadedFile,
            $filename
        );

        return $filename;
    }
    return null;
}

function copyFile($old_path, $new_path)
{
    if (Storage::exists($old_path)) {
        if (Storage::exists($new_path)) {
            Storage::delete($new_path);
        }
        Storage::copy($old_path, $new_path);
    }
}
function moveFile($old_path, $new_path)
{
    $fileName = 'public' . Str::remove('/storage', $old_path);
    if (Storage::exists($fileName)) {
        if (Storage::exists($new_path)) {
            Storage::delete($new_path);
        }
        Storage::move($fileName, $new_path);
    }
}

function deleteFile($path)
{
    $fileName = 'public/' . Str::remove('/storage', $path);
    if (Storage::exists($fileName)) {
        Storage::delete($fileName);
    }
}
