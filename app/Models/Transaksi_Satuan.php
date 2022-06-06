<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Satuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_invoice',
        'layanan',
        'item',
        'size',
        'harga',           
        'jumlah',           
        'total_biaya',
        'biaya_sekarang',
        'sisa_biaya',
        'via',
        'mulai' ,
        'selesai',
        'keterangan',
        'collected_by',
    ];
}
