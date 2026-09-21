@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <x-page-hero
        :kicker="$page->get('hero_kicker')"
        :title="$page->get('hero_title')"
        :description="$page->get('hero_text')"
        :image="$page->imageUrl('hero_image', 'cobertura-nacional.jpg')"
    />

    <section class="border-b border-navy-950/10 bg-white py-8">
        <div class="container-site grid gap-px bg-navy-950/10 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($page->items('stats') as $stat)
                <div class="bg-white p-7">
                    <span class="counter font-display text-3xl font-bold text-navy-900" data-value="{{ $stat['number'] ?? '' }}">{{ $stat['number'] ?? '' }}</span>
                    <span class="mt-1 block text-sm text-grey-600">{{ $stat['label'] ?? '' }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_380px]">
                <div>
                    <span class="section-kicker">{{ $page->get('coverage_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('coverage_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('coverage_text') }}</p>
            </div>

            <div class="mt-12 flex flex-wrap gap-2" role="group" aria-label="Filtrar cobertura por setor">
                @foreach (['todos' => 'Todos', 'banca' => 'Banca', 'retalho' => 'Retalho', 'industria' => 'Indústria e saúde'] as $filter => $label)
                    <button type="button" class="coverage-filter border border-navy-950/20 px-4 py-2 text-sm font-semibold transition hover:border-teal-500 aria-pressed:border-coral-500 aria-pressed:bg-coral-500 aria-pressed:text-white" data-filter="{{ $filter }}" aria-pressed="{{ $filter === 'todos' ? 'true' : 'false' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($page->items('locations') as $location)
                    <article class="coverage-point reveal border border-navy-950/10 bg-white p-6" data-sector="{{ $location['sector'] ?? '' }}">
                        <span class="font-mono text-[11px] uppercase text-teal-500">{{ $location['label'] ?? '' }}</span>
                        <h3 class="mt-3 text-xl font-semibold">{{ $location['place'] ?? '' }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_380px]">
                <div>
                    <span class="section-kicker">{{ $page->get('cases_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('cases_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('cases_text') }}</p>
            </div>
            <div class="mt-10 border-l-2 border-coral-500 bg-paper p-7">
                <p class="font-semibold">{{ $page->get('cases_notice_title') }}</p>
                <p class="mt-2 text-sm leading-6 text-grey-600">{{ $page->get('cases_notice_text') }}</p>
            </div>
        </div>
    </section>
@endsection
