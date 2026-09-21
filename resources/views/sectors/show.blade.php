@extends('layouts.site')

@section('title', $sector->title.'. Wecomp')
@section('description', $sector->excerpt)

@section('content')
    <x-page-hero
        kicker="Solução por setor"
        :title="$sector->title"
        :description="$sector->excerpt"
        :image="$sector->hero_image_url"
    >
        <a href="{{ route('contact', ['setor' => $sector->slug]) }}" class="button-primary mt-8">Falar com um consultor</a>
    </x-page-hero>

    <section class="section-space">
        <div class="container-site grid gap-12 lg:grid-cols-[1fr_360px]">
            <article class="reveal">
                <span class="section-kicker">Contexto operacional</span>
                <div class="cms-content">
                    {!! $sector->content !!}
                </div>
            </article>
            <aside class="reveal self-start bg-navy-900 p-7 text-white">
                <span class="font-mono text-xs uppercase text-teal-300">Abordagem Wecomp</span>
                <p class="mt-5 text-lg font-semibold">Avaliar antes de especificar.</p>
                <p class="mt-4 text-sm leading-6 text-white/70">O levantamento olha para a ocupação, os ativos críticos, as pessoas, a continuidade e a lei aplicável.</p>
            </aside>
        </div>
    </section>

    @if ($sector->solutions->isNotEmpty())
        <section class="section-space bg-white">
            <div class="container-site">
                <div class="reveal">
                    <span class="section-kicker">Soluções recomendadas</span>
                    <h2 class="section-title">Proteção integrada para este setor.</h2>
                </div>
                <div class="mt-12 grid gap-6 lg:grid-cols-3">
                    @foreach ($sector->solutions as $solution)
                        <a href="{{ route('solutions.show', $solution) }}" class="content-card reveal">
                            <span class="font-mono text-[11px] uppercase text-teal-500">{{ $solution->legal_framework }}</span>
                            <h3 class="mt-4 text-xl font-semibold">{{ $solution->title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $solution->excerpt }}</p>
                            <span class="mt-7 block text-sm font-semibold text-coral-500">Ver solução →</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section-space">
        <div class="container-site">
            <div class="reveal">
                <span class="section-kicker">Critérios de projeto</span>
                <h2 class="section-title">Quatro dimensões que orientam a intervenção.</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (['Pessoas e ocupação', 'Ativos críticos', 'Continuidade operacional', 'Evidência para auditoria'] as $criterion)
                    <div class="reveal bg-paper p-7">
                        <span class="text-lg font-semibold">{{ $criterion }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
