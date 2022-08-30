<?php

namespace App\Models;

use App\Models\Certificates\Certificate;
use App\Models\Certificates\CertificateFile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function certificate()
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }
    function certificateFile()
    {
        return $this->hasMany(CertificateFile::class, 'user_id');
    }

    function hasUserPrivilages()
    {
        if (
            $this->can('admin-user-list') ||
            $this->can('admin-user-view') ||
            $this->can('admin-user-add') ||
            $this->can('admin-user-edit') ||
            $this->can('admin-user-delete')
        ) {
            return true;
        }
        return false;
    }
    function hasRolesPrivilages()
    {
        if (
            $this->can('admin-role-list') ||
            $this->can('admin-role-view') ||
            $this->can('admin-role-add') ||
            $this->can('admin-role-edit') ||
            $this->can('admin-role-delete')
        ) {
            return true;
        }
        return false;
    }
    function hasCertificatePrivilages()
    {
        if (
            $this->can('certificates-list') ||
            $this->can('certificates-view') ||
            $this->can('certificates-add')
        ) {
            return true;
        }
        return false;
    }
}
