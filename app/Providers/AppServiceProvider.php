<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

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
        Filament::serving(function() {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Store')
                    ->icon('heroicon-s-shopping-cart'),
                NavigationGroup::make()
                    ->label('Settings')
                    ->icon('heroicon-s-adjustments-vertical')
            ]);
        });

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch->locales(['en','es','fr']);
        });
    }
}
