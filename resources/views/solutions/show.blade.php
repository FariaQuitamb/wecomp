@extends('layouts.site')

@section('title', $solution->title.'. Wecomp')
@section('description', $solution->excerpt)

@section('content')
    <x-page-hero
        :kicker="$solution->eyebrow ?: $page->get('hero_kicker')"
        :title="$solution->title"
        :description="$solution->excerpt"
        :image="$solution->hero_image_url"
    >
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('contact', ['solucao' => $solution->slug]) }}" class="button-primary">{{ $page->get('cta_label') }}</a>
            <a href="#detalhes" class="button-outline">{{ $page->get('details_cta') }}</a>
        </div>
    </x-page-hero>

    <section id="detalhes" class="section-space">
        <div class="container-site grid gap-12 lg:grid-cols-[1fr_360px]">
            <article class="reveal">
                <span class="section-kicker">{{ $page->get('show_kicker') }}</span>
                <div class="cms-content">
                    {!! $solution->content !!}
                </div>
            </article>

            <aside class="reveal self-start border-l-2 border-coral-500 bg-white p-7">
                <span class="font-mono text-xs uppercase text-teal-500">{{ $page->get('legal_kicker') }}</span>
                <p class="mt-4 text-lg font-semibold">{{ $solution->legal_framework ?: $page->get('legal_fallback') }}</p>
                <p class="mt-4 text-sm leading-6 text-grey-600">{{ $page->get('legal_text') }}</p>
            </aside>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal">
                <span class="section-kicker">{{ $page->get('process_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('process_title') }}</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($page->items('process_steps') as $step)
                    <article class="reveal bg-white p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $step['number'] ?? '' }}</span>
                        <h3 class="mt-7 text-lg font-semibold">{{ $step['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $step['text'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if ($solution->sectors->isNotEmpty())
        <section class="section-space">
            <div class="container-site">
                <span class="section-kicker">{{ $page->get('related_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('related_title') }}</h2>
                <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($solution->sectors as $sector)
                        <a href="{{ route('sectors.show', $sector) }}" class="content-card">
                            <h3 class="text-xl font-semibold">{{ $sector->title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $sector->excerpt }}</p>
                            <span class="mt-6 block text-sm font-semibold text-coral-500">{{ $page->get('related_cta') }} →</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
