<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SiteView;

class CountSiteViews
{
    public function handle($request, Closure $next)
    {
        $view = SiteView::first();

        if ($view) {
            $view->increment('views');
        }

        return $next($request);
    }
}
