@extends('layouts.site')

@section('title', $sector->title.'. Wecomp')
@section('description', $sector->excerpt)

@section('content')
    <x-page-hero
        :kicker="$page->get('show_kicker')"
        :title="$sector->title"
        :description="$sector->excerpt"
        :image="$sector->hero_image_url"
    >
        <a href="{{ route('contact', ['setor' => $sector->slug]) }}" class="button-primary mt-8">{{ $page->get('show_cta') }}</a>
    </x-page-hero>

    <section class="section-space">
        <div class="container-site grid gap-12 lg:grid-cols-[1fr_360px]">
            <article class="reveal">
                <span class="section-kicker">{{ $page->get('context_kicker') }}</span>
                <div class="cms-content">
                    {!! $sector->content !!}
                </div>
            </article>
            <aside class="reveal self-start bg-navy-900 p-7 text-white">
                <span class="font-mono text-xs uppercase text-teal-300">{{ $page->get('approach_kicker') }}</span>
                <p class="mt-5 text-lg font-semibold">{{ $page->get('approach_title') }}</p>
                <p class="mt-4 text-sm leading-6 text-white/70">{{ $page->get('approach_text') }}</p>
            </aside>
        </div>
    </section>

    @if ($sector->solutions->isNotEmpty())
        <section class="section-space bg-white">
            <div class="container-site">
                <div class="reveal">
                    <span class="section-kicker">{{ $page->get('related_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('related_title') }}</h2>
                </div>
                <div class="mt-12 grid gap-6 lg:grid-cols-3">
                    @foreach ($sector->solutions as $solution)
                        <a href="{{ route('solutions.show', $solution) }}" class="content-card reveal">
                            <span class="font-mono text-[11px] uppercase text-teal-500">{{ $solution->legal_framework }}</span>
                            <h3 class="mt-4 text-xl font-semibold">{{ $solution->title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $solution->excerpt }}</p>
                            <span class="mt-7 block text-sm font-semibold text-coral-500">{{ $page->get('related_cta') }} →</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section-space">
        <div class="container-site">
            <div class="reveal">
                <span class="section-kicker">{{ $page->get('criteria_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('criteria_title') }}</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($page->items('criteria') as $criterion)
                    <div class="reveal bg-paper p-7">
                        <span class="text-lg font-semibold">{{ $criterion['text'] ?? '' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
