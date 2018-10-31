<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use App\setting;
use App\Pemesanan;
use App\Opsi_Pemesanan;

class SendInvoicePurchase extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($codeTransaction)
    {
        $this->codeTransaction = $codeTransaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $codeTransaction = $this->codeTransaction;
        $appname = setting::first()->nama_web;
        $userName = Auth::user()->name;
        $email = Auth::user()->email;

        $detailTransaction = Pemesanan::where('kode_pemesanan',$codeTransaction)->with(['opsiDetailHistory' => function($query)
        {
            $query->with('detailProduct');
        }])->first();

        $data = array(
            'appname' => $appname,
            'detailTransaction' => $detailTransaction,
            'userName' => $userName,
        );
        return $this->markdown('frontend.email.invoice',$data)->to($email)->subject('Invoice purchase')
                    ->from('bukabaju@gmail.com','Bukabaju');
    }
}
