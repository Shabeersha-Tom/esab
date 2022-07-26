<?php

namespace App\Models\Certificates;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Certificate extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_name',
        'certificate_no',
        'test',
        'item_1',
        'item_2',
        'lot_1',
        'lot_2',
        'views',
        'downloads',
    ];

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
            $this,
            "",
        );
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function file()
    {
        return $this->hasOne(CertificateFile::class, 'certificate_no');
    }
}
