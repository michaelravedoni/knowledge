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

        if (file_exists($favIcon = storage_path('app/public/favicon.png'))) {
            config(['filament.favicon' => asset('storage/favicon.png') . '?v=' . md5_file($favIcon)]);
        }
    }

    protected function addVerificationMiddleware(Kernel $kernel)
    {
        $kernel->appendMiddlewareToGroup('authed', 'verified');
    }
}
