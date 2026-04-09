<?php

namespace App\Services\LeadSearch;

class InstagramSearchService
{
    public function search($keyword)
    {
        return [
            [
                'name' => 'Butik Style IG',
                'website' => 'https://instagram.com/butikstyle',
                'platform' => 'instagram',
                'followers' => 12000,
                'has_shop' => false,
            ],
            [
                'name' => 'Urban IG',
                'website' => 'https://instagram.com/urbanig',
                'platform' => 'instagram',
                'followers' => 8500,
                'has_shop' => false,
            ],
            [
                'name' => 'Moda IG',
                'website' => 'https://instagram.com/modaig',
                'platform' => 'instagram',
                'followers' => 5000,
                'has_shop' => false,
            ],
        ];
    }
}
