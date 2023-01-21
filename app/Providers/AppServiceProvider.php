<?php

namespace App\Providers;

use App\Http\Kernel;
use Filament\Facades\Filament;
use Illuminate\Foundation\Vite;
use App\Settings\GeneralSettings;
use App\Services\OgImageGenerator;
use App\SocialProviders\SsoProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel): void
    {
        View::composer('partials.meta', static function ($view) {
            $view->with(
                'defaultImage',
                OgImageGenerator::make(app(GeneralSettings::class)->site_name)
                    ->withSubject('Support')
                    ->withPolygonDecoration()
                    ->withFilename('og.jpg')
                    ->generate()
                    ->getPublicUrl()
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
