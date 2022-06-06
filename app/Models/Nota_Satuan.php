<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Storage;

class Nota_Satuan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public static function sendCustomerEmail($data, $pdf)
    {
        $path = Storage::put('public/storage/uploads/'.'-'.rand() .'_'.time(). '.'.'pdf', $pdf->output());
        Storage::put($path, $pdf->output());

        $email_pelanggan = DB::table('data__pelanggans')->select('email')->where('no_invoice', $data[0]->no_invoice)->first();
        $viewData['no_invoice'] = $data[0]->no_invoice;
        $viewData['nama'] = $data[0]->nama;
        $viewData['email'] = $email_pelanggan->email;

        Mail::send('nota_satuan_pdf', $viewData, function($m) use($email_pelanggan, $data, $pdf, $path){
            $m->from('rajab251000@gmail.com', env('APP_NAME'));
            $m->to([$email_pelanggan->email, 'rajab251000@gmail.com'])->subject($data[0]->nama)
            ->attachData($pdf->output(), $path, [
                'mime' => 'application/pdf',
                'as' => $data[0]->nama. '.'.'pdf',
            ]);
        });
    }
}
