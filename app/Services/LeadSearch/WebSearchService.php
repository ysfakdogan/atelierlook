<?php

namespace App\Services\LeadSearch;

class WebSearchService
{
    public function search($keyword)
    {
        return [
            [
                'name' => 'Zara Butik',
                'website' => 'https://zara.com',
                'platform' => 'website',
                'followers' => null,
                'has_shop' => true,
            ],
            [
                'name' => 'Luxury Moda',
                'website' => 'https://luxurymoda.com',
                'platform' => 'website',
                'followers' => null,
                'has_shop' => false,
            ]
        ];
    }
}
