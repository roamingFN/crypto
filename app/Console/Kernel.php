<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;
use DB;
use Carbon\Carbon;
use App\Service\PullDataService;
use App\Service\StoreDataService;
use App\Service\FormatterService;

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
            //init
            $pullDataService = app(PullDataService::class);
            $storeDataService = app(StoreDataService::class);
            $formatterService = app(FormatterService::class);

            //get coins
            $coins = $pullDataService->getCoins();

            //pull data
            $coinsArray = $pullDataService->each($coins);
            
            //store data
            foreach ($coinsArray as $coin) {
                $storeDataService->store($coin);
            }
        });
    }
}
