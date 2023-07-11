<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna_dosen extends Model implements Authenticatable
{
    use HasFactory,AuthenticatableTrait;

    protected $guarded = ['Hak_Akses'];
    protected $table = 'pengguna_dosens';
    protected $primaryKey = 'email';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'NIK_dosen',
        'nama_dosen',
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
