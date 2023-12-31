<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    use HasFactory;

    protected $guarded = ['ID_Riwayat', 'ID_Transaksi'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    
}
