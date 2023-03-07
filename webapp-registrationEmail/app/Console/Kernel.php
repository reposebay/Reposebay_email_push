<?php

namespace App\Console;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\subExpiring;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {$today = new DateTime();
            $sevenDays = Carbon::now()->addDays(7);
            $expire = substr($sevenDays,0,10);
            
            $users = User::where('type', '=', 'company')->where('plan_expire_date',$expire)->get();
            if ($users->count() > 0) {
            foreach ($users as $user) {
            
            Mail::to($user->email)->send(new subExpiring($user->name,7));
            }
            
            }
            
            // Three days
            
            $today = new DateTime();
            $threeDays = Carbon::now()->addDays(3);
            $expire = substr($threeDays,0,10);
            $users = User::where('type', '=', 'company')->where('plan_expire_date',$expire)->get();
            
            if ($users->count() > 0) {
            foreach ($users as $user) {
            
            Mail::to($user->email)->send(new subExpiring($user->name,3));
            }
            
            }  })->everyMinute();
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
