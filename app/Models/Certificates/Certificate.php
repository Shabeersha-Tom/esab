<?php

namespace App\Models\Certificates;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Certificate extends Model implements Searchable, Viewable
{
    use HasFactory, InteractsWithViews;

    protected $removeViewsOnDelete = true;

    protected $fillable = [
        'user_id',
        'certificate_name',
        'certificate_no',
        'test',
        'item_1',
        'item_2',
        'lot_1',
        'lot_2',
        'slug',
        'status',
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

    function getViews()
    {
        return $this->views->where('collection', 'views')->unique('visitor')->count() ?? 0;
    }

    function getDownloads()
    {
        return $this->views->where('collection', 'downloads')->unique('visitor')->count() ?? 0;
    }
}
