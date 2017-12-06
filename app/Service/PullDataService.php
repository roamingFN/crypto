<?php

namespace App\Service;

use GuzzleHttp\Client;

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
}