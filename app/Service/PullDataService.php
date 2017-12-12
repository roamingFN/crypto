<?php

namespace App\Service;

use GuzzleHttp\Client;
use DB;

class PullDataService 
{
    const LIMIT = 2;
    protected $client;

    public function __construct (Client $client)
    {
        $this->client = $client;
    }

    /**
     * get limit numbers of coin's data from coinmarketcap api
     * return json
     */
    public function all ()
    {
        $res = $this->client->request('GET', 'https://api.coinmarketcap.com/v1/ticker/?limit='.self::LIMIT);
    
        return $res->getBody();
    }

    public function each ($coins)
    {
        foreach ($coins as $coin) {
            $res = $this->client->request('GET', 'https://api.coinmarketcap.com/v1/ticker/'.$coin->name);
            $data[] = json_decode($res->getBody(), true);
        }

        return $data;
    }

    public function getCoins ()
    {
        return DB::table('coins')->get();
    }
}