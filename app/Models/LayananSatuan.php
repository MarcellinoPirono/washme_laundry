<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananSatuan extends Model
{
    public $table = "data__layanan__satuans";
    use HasFactory;
    protected $guarded = [
        'id',
    ];
}
