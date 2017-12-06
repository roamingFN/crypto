<?php

use Illuminate\Database\Seeder;
use App\Service\PullDataService;
use App\Service\FormatterService;
use Carbon\Carbon;

class CoinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $pullDataService = app(PullDataService::class);
        $formatterService = app(FormatterService::class);

        //pull data
        $coinsJson = $pullDataService->all();
        $coinsArray = $formatterService->jsonToArray($coinsJson);
        
        foreach ($coinsArray as $coin) {
            DB::table('coins')->insert([
                'name' => $coin['name'], 
                'symbol' => $coin['symbol'], 
                'created_at' => Carbon::now(), 
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
