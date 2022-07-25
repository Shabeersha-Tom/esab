<?php

namespace App\Models\Certificates;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'certificate_no',
        'test',
        'item_1',
        'item_2',
        'lot_1',
        'lot_2',
        'views',
        'downloads',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
