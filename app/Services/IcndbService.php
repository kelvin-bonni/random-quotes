<?php

namespace App\Services;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class IcndbService
{
    private $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.icndb.com';
    }

    public function getRandomQuote(array $categories = null)
    {
        $filter = '';
        if ($categories) {
            $filter.='limitTo=['. implode(',',$categories).']';
        }
        $response = Http::get("{$this->baseUrl}/jokes/random?".$filter);

        return $response['value']['joke'];
    }

    public function getCustomQuote($firstName, $lastName)
    {
        $response =  Http::get("{$this->baseUrl}/jokes/random?firstName={$firstName}&lastName={$lastName}");

        return $response['value']['joke'];
    }

    public function getCategories()
    {
        return Cache::remember('jokes.categories', now()->addDay(), function () {
            $response = Http::get("{$this->baseUrl}/categories");

            return $response['value'];
        });
    }
}

