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
    ];

    public function certificate()
    {
        return $this->belongsTo(Certificate::class, 'certificate_no');
    }

    public function getFile($id)
    {
        return Storage::url("certificates/" . $id . '/' . $this->path);
    }
}
