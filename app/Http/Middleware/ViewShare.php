<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use app\Settings\GeneralSettings;
use Illuminate\Support\Facades\View;

class ViewShare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        View::share('settings', app(GeneralSettings::class));

        return $next($request);
    }
}
