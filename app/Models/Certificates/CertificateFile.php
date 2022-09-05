<?php

namespace App\Models\Certificates;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class CertificateFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_no',
        'path',
        'status',
        'user_id'
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certificate_no');
    }

    public function getOgFilePath($id)
    {
        return Storage::disk('public')->path("certificates-orginal/" . $id . '/' . $this->path);
    }
    public function getFilePath($id)
    {
        return Storage::disk('public')->path("certificates/" . $id . '/' . $this->path);
    }

    public function getFileStoragePath($id)
    {
        return "certificates/" . $id . '/' . $this->path;
    }

    public function getFile($id)
    {
        return Storage::url("certificates/" . $id . '/' . $this->path);
    }
}
