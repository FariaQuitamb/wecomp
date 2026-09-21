<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientLocation;
use App\Models\Page;
use App\Models\Sector;
use App\Models\Solution;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'page' => Page::for('home'),
            'solutions' => Solution::query()->published()->get(),
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'page' => Page::for('about'),
        ]);
    }

    public function results(): View
    {
        $featuredClients = collect();
        $portfolio = collect();

        if (Schema::hasTable('clients') && Schema::hasTable('client_locations')) {
            $featuredClients = Client::query()->featured()->get();
            $portfolio = ClientLocation::query()
                ->with('client')
                ->whereHas('client', fn ($query) => $query->published())
                ->orderBy('province_sort')
                ->orderBy('sort_order')
                ->get()
                ->groupBy('province');
        }

        return view('results', [
            'page' => Page::for('results'),
            'featuredClients' => $featuredClients,
            'portfolio' => $portfolio,
        ]);
    }

    public function solutions(): View
    {
        return view('solutions.index', [
            'page' => Page::for('solutions'),
            'solutions' => Solution::query()->published()->get(),
        ]);
    }

    public function solution(Solution $solution): View
    {
        abort_unless($solution->is_published, 404);

        return view('solutions.show', [
            'page' => Page::for('solutions'),
            'solution' => $solution->load('sectors'),
        ]);
    }

    public function sectors(): View
    {
        return view('sectors.index', [
            'page' => Page::for('sectors'),
            'sectors' => Sector::query()->published()->get(),
        ]);
    }

    public function sector(Sector $sector): View
    {
        abort_unless($sector->is_published, 404);

        return view('sectors.show', [
            'page' => Page::for('sectors'),
            'sector' => $sector->load('solutions'),
        ]);
    }

    public function privacy(): View
    {
        return view('legal', [
            'page' => Page::for('privacy'),
        ]);
    }

    public function terms(): View
    {
        return view('legal', [
            'page' => Page::for('terms'),
        ]);
    }
}
