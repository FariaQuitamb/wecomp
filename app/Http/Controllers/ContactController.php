<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(Request $request): View
    {
        $selectedSector = match ($request->string('setor')->toString()) {
            'banca-e-financas' => 'banca',
            'retalho-e-distribuicao' => 'retalho',
            'industria-logistica-e-saude' => 'industria',
            default => null,
        };

        return view('contact', [
            'page' => Page::for('contact'),
            'selectedSector' => $selectedSector,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'company' => ['required', 'string', 'max:160'],
            'sector' => ['required', 'in:banca,retalho,industria,saude,outro'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['nullable', 'email:rfc', 'max:160'],
            'message' => ['nullable', 'string', 'max:3000'],
            'website' => ['prohibited'],
        ]);

        unset($validated['website']);

        Lead::create([
            ...$validated,
            'source' => $request->string('source')->limit(160)->toString() ?: 'contacto',
        ]);

        return to_route('contact')->with(
            'success',
            Page::for('contact')->get('success_message', 'Recebemos o seu pedido. A nossa equipa entrará em contacto.'),
        );
    }
}
