<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Jobs\SendPromoNotification;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       $schedule->call(function () {
            $notifPromo = DB::table('master_promos')->where('berlaku_awal',date('Y-m-d'))->get();
            $no = 1;
            foreach ($notifPromo as $itemPromo) {
                $delay = 5*$no++;
                SendPromoNotification::dispatch($itemPromo->kode_promo)
                ->delay(now()->addSeconds($delay));
            }
        })->twiceDaily(7, 15);

       $schedule->command('queue:work')->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
