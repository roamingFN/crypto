<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OmiseGoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'name' => 'OmiseGo',
            'symbol' => 'OMG'
        ]);
    }
}
