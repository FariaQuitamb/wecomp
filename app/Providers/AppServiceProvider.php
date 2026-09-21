<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Sector;
use App\Models\Solution;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.site', function ($view): void {
            $view->with([
                'sitePage' => Schema::hasTable('pages')
                    ? Page::for('layout')
                    : new Page(['data' => []]),
                'footerSolutions' => Schema::hasTable('solutions')
                    ? Solution::query()->published()->limit(3)->get()
                    : collect(),
                'footerSectors' => Schema::hasTable('sectors')
                    ? Sector::query()->published()->limit(3)->get()
                    : collect(),
            ]);
        });
    }
}
