<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class);
    }

    public function majalah()
    {
        return $this->hasMany(Majalah::class);
    }

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }

    public function skripsi()
    {
        return $this->hasMany(Skripsi::class);
    }
}
