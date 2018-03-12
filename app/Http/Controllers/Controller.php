<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    public function index ()
    {
        return view('index', [
            'data' => DB::table('prices')->where('coin_id', '=', 6)->get()
        ]);
    }
}
