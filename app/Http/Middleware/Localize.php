<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use app\Settings\GeneralSettings;
use Illuminate\Support\Facades\Session;

class Localize
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

        $localeQueryString = $request->query('l');
        $availableLocales = app(GeneralSettings::class)->languages;
        $defaultLocale = app(GeneralSettings::class)->fallback_language ?? config('app.locale');

        if ($localeQueryString != null) {
            $locale = $localeQueryString;
        }
		else if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            $locale = locale_accept_from_http($request->server('HTTP_ACCEPT_LANGUAGE'));
        }

        $language = locale_get_primary_language($locale);
        $normalizedLocale = locale_lookup($availableLocales, $locale, true, $defaultLocale);

        app()->setLocale($normalizedLocale);
        Carbon::setLocale($normalizedLocale);
        $request->session()->put('locale', $normalizedLocale);

        return $next($request);
    }
}
