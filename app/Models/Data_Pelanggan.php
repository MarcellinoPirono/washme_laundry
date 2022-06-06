<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_invoice',
        'tgl_transaksi',
        'nama',
        'handphone',
        'email',
        'alamat',
        'status_pembayaran',
        'status_pengambilan',
        'status_proses',
    ];
}
