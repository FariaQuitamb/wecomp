<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Solution;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function solutions(): View
    {
        return view('solutions.index', [
            'solutions' => Solution::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->get(),
        ]);
    }

    public function solution(Solution $solution): View
    {
        abort_unless($solution->is_published, 404);

        return view('solutions.show', [
            'solution' => $solution->load('sectors'),
        ]);
    }

    public function sectors(): View
    {
        return view('sectors.index', [
            'sectors' => Sector::query()
                ->where('is_published', true)
                ->orderBy('sort_order')
                ->get(),
        ]);
    }

    public function sector(Sector $sector): View
    {
        abort_unless($sector->is_published, 404);

        return view('sectors.show', [
            'sector' => $sector->load('solutions'),
        ]);
    }
}
