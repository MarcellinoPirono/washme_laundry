<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Support\Facades\Storage;

class Nota_Kiloan extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_invoice',
        'nama',
        'status_pembayaran',
        'layanan',
        'berat',
        'estimasi_waktu',
        'total_biaya',
        'biaya_sekarang',
        'sisa_biaya',
        'via',
        'mulai',
        'selesai',
        'keterangan',
        'collected_by',
    ];

    public static function sendCustomerEmail($data, $pdf)
    {
        $path = Storage::put('public/storage/uploads/'.'-'.rand() .'_'.time(). '.'.'pdf', $pdf->output());
        Storage::put($path, $pdf->output());

        $email_pelanggan = DB::table('data__pelanggans')->select('email')->where('no_invoice', $data->no_invoice)->first();
        $viewData['no_invoice'] = $data->no_invoice;
        $viewData['nama'] = $data->nama;
        $viewData['email'] = $email_pelanggan->email;
        $viewData['layanan'] = $data->layanan;

        Mail::send('nota_kiloan_pdf', $viewData, function($m) use($email_pelanggan, $data, $pdf, $path){
            $m->from('rajab251000@gmail.com', env('APP_NAME'));
            $m->to([$email_pelanggan->email, 'rajab251000@gmail.com'])->subject($data->nama)
            ->attachData($pdf->output(), $path, [
                'mime' => 'application/pdf',
                'as' => $data->nama. '.'.'pdf',
            ]);
        });
    }
}
