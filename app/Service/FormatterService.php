<?php

namespace App\Service;

class FormatterService
{
    public function jsonToArray ($json)
    {
        return json_decode($json, true);
    }
}