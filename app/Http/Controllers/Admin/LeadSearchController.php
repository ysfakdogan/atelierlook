<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\LeadSearch\LeadAggregator;
use App\Models\Lead;

class LeadSearchController extends Controller
{
    public function index()
    {
        return view('admin.leads.search');
    }

    public function search(Request $request, LeadAggregator $aggregator)
    {
        $request->validate([
            'keyword' => 'required'
        ]);

        // 🔥 SADECE GERÇEK VERİ
        $results = [];

        // 🔥 SERPAPI
        $response = Http::get('https://serpapi.com/search', [
            'q' => $request->keyword,
            'location' => 'Istanbul, Turkey',
            'hl' => 'tr',
            'gl' => 'tr',
            'num' => 20,
            'api_key' => env('SERPAPI_KEY')
        ]);

        $data = $response->json();

        // 🔥 GELEN VERİYİ AKILLI ŞEKİLDE AYRIŞTIR
        if (isset($data['organic_results'])) {
            foreach ($data['organic_results'] as $item) {

                $link = $item['link'] ?? '';

                // Instagram mı?
                $isInstagram = str_contains($link, 'instagram.com');

                // Post mu?
                $isPost = str_contains($link, '/p/') ||
                          str_contains($link, '/reel/') ||
                          str_contains($link, '/tv/');

                // Username çıkar
                $username = null;
                if ($isInstagram) {
                    $parts = explode('/', trim(parse_url($link, PHP_URL_PATH), '/'));
                    $username = $parts[0] ?? null;
                }

                // Platform belirle
                $platform = 'web';
                if ($isInstagram) {
                    $platform = $isPost ? 'instagram_post' : 'instagram';
                }

                $results[] = [
                    'name' => $item['title'] ?? 'Bilinmiyor',
                    'platform' => $platform,
                    'website' => $link,
                    'username' => $username,
                    'followers' => 0,
                    'temperature' => $isPost ? 'hot' : ($isInstagram ? 'medium' : 'cold')
                ];
            }
        }

        return view('admin.leads.results', [
            'leads' => $results,
            'keyword' => $request->keyword
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'nullable|string',
            'platform' => 'nullable|string',
            'url' => 'nullable|string',
            'followers' => 'nullable|numeric',
            'temperature' => 'nullable|string',
        ]);

        Lead::create([
            'brand_name' => $request->brand_name ?? 'İsimsiz',
            'platform' => $request->platform,
            'profile_url' => $request->url,
            'followers' => $request->followers ?? 0,
            'temperature' => $request->temperature ?? 'cold',
            'status' => 'new',
        ]);

        return back()->with('success', 'Lead kaydedildi');
    }

    public function list()
    {
        $leads = Lead::latest()->get();

        return view('admin.leads.list', compact('leads'));
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return back()->with('success', 'Silindi');
    }
}
