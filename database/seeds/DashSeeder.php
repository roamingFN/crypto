<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'name' => 'Dash', 
            'symbol' => 'DASH', 
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);
    }
}
