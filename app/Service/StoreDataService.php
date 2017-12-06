<?php

namespace App\Service;

use DB;
use Carbon\Carbon;

class StoreDataService 
{
    public function store ($coin)
    {
        // get coin id
        $id = $this->getCoinId($coin['symbol']);

        // store into database
        DB::table('prices')->insert([
            'coin_id' => $id,
            'price' => $coin['price_usd'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * return integer
     */
    private function getCoinId ($symbol)
    {
        $result = DB::table('coins')->select('id')->where('symbol', $symbol)->first();

        return $result->id;
    }
}