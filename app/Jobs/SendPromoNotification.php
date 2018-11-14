<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Promo;
use App\setting;

class SendPromoNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $codePromo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($codePromo)
    {
        $this->codePromo = $codePromo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
          $showpromo = Promo::where('kode_promo',$this->codePromo)->first();
          $showsetting = setting::first();
           // setting header
          $heading = array(
            "en" => $showsetting->nama_web.'has a new promo',
          );
          $content = array(
            "en" => $showpromo->kode_promo.': $'.$showpromo->diskon.' discount for a minimum purchase of $'.$showpromo->min_pembelian,
          );

      		$fields = array(
      			'app_id' => "9c0712c7-6d43-4435-978f-a57f306b7d4f",
      			'included_segments' => array('Active Users'),
            'chrome_web_image'  => asset('storage/imagepromo/'.$showpromo->foto),
            'chrome_web_icon'  => asset('storage/imagesetup/'.$showsetting->foto),
            'url' => route('frontpromoIndex'),
            'contents' => $content,
            'headings' => $heading,
      		);

      		$fields = json_encode($fields);

      		$ch = curl_init();
      		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
      		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
      												   'Authorization: Basic Y2FiN2QwZGQtNWRmYS00Y2QwLWIwMjYtZjQ4ZWQwODU3Mjk5'));
      		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      		curl_setopt($ch, CURLOPT_HEADER, FALSE);
      		curl_setopt($ch, CURLOPT_POST, TRUE);
      		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

      		$response = curl_exec($ch);
      		curl_close($ch);
    }
}
