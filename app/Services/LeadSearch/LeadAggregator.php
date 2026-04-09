<?php

namespace App\Services\LeadSearch;

class LeadAggregator
{
    protected $web;
    protected $instagram;

    public function __construct(
        WebSearchService $web,
        InstagramSearchService $instagram
    ) {
        $this->web = $web;
        $this->instagram = $instagram;
    }

    public function search($keyword)
    {
        $webLeads = $this->web->search($keyword);
        $instaLeads = $this->instagram->search($keyword);

        $all = array_merge($webLeads, $instaLeads);

        return $this->score($all);
    }

    protected function score($leads)
    {
        return collect($leads)->map(function ($lead) {

            $score = 0;

            // platform
            if ($lead['platform'] === 'website') $score += 3;
            if ($lead['platform'] === 'instagram') $score += 2;

            // followers
            if (!empty($lead['followers']) && $lead['followers'] > 10000) {
                $score += 3;
            }

            // shop
            if (!empty($lead['has_shop'])) {
                $score += 3;
            }

            // 🔥 SICAKLIK
            if ($score >= 7) {
                $lead['temperature'] = 'hot';
            } elseif ($score >= 4) {
                $lead['temperature'] = 'medium';
            } else {
                $lead['temperature'] = 'cold';
            }

            $lead['score'] = $score;

            return $lead;

        })->sortByDesc('score')->values()->toArray();
    }
}
