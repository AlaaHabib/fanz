<?php

namespace App\Providers;

use App\Models\Player;
use App\Observers\PlayerObserver;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Player::observe(PlayerObserver::class);

        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make()
                    ->label("Api Docs")
                    ->url(route("l5-swagger.default.api"), true)
                    ->icon('heroicon-o-code-bracket-square'),
            ]);
        });


    }
}
