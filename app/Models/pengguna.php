<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class pengguna extends Model implements Authenticatable
{
    use HasFactory,AuthenticatableTrait;

    protected $guarded = ['Hak_Akses'];
    protected $table = 'penggunas';
    protected $primaryKey = 'email';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'NIM',
        'Nama',
        'Username',
        'Password',
    ];

    protected $hidden = [
        'Password',
        'remember_token',
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

}
