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

            @if ($page->items('portfolio'))
                <div class="mt-12 grid gap-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($page->items('portfolio') as $province)
                        <a href="#provincia-{{ \Illuminate\Support\Str::slug($province['name'] ?? '') }}" class="group flex items-center justify-between border border-navy-950/10 bg-white px-5 py-4 transition hover:border-coral-500">
                            <span class="font-semibold">{{ $province['name'] ?? '' }}</span>
                            <span class="font-mono text-[11px] text-grey-400 group-hover:text-coral-500">{{ count($province['groups'] ?? []) }}</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section id="carteira" class="bg-white">
        <div class="border-y border-navy-950/10 bg-navy-950 py-16 text-white">
            <div class="container-site">
                <div class="reveal grid gap-8 lg:grid-cols-[1fr_380px] lg:items-end">
                    <div>
                        <span class="section-kicker text-teal-300">{{ $page->get('cases_kicker') }}</span>
                        <h2 class="max-w-[16ch] text-3xl font-semibold md:text-4xl">{{ $page->get('cases_title') }}</h2>
                    </div>
                    <p class="text-white/70">{{ $page->get('cases_text') }}</p>
                </div>

                @if ($page->items('featured_clients'))
                    <div class="mt-12 grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6">
                        @foreach ($page->items('featured_clients') as $client)
                            <div class="flex items-center gap-3 border border-white/10 bg-white/5 p-3">
                                <x-client-mark :name="$client['name'] ?? ''" :logo="$client['logo'] ?? null" size="sm" />
                                <span class="text-sm font-medium leading-5">{{ $client['name'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="container-site section-space">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="flex flex-wrap gap-2" role="group" aria-label="Filtrar carteira por setor">
                    @foreach (['todos' => 'Todos', 'banca' => 'Banca', 'retalho' => 'Retalho', 'industria' => 'Indústria e saúde'] as $filter => $label)
                        <button type="button" class="portfolio-filter border border-navy-950/20 px-4 py-2 text-sm font-semibold transition hover:border-teal-500 aria-pressed:border-coral-500 aria-pressed:bg-coral-500 aria-pressed:text-white" data-filter="{{ $filter }}" aria-pressed="{{ $filter === 'todos' ? 'true' : 'false' }}">
                            {{ $label }}
                        </button>
                    @endforeach
                </div>
                <label class="relative w-full max-w-sm">
                    <span class="sr-only">Procurar instituição ou localidade</span>
                    <input type="search" id="portfolio-search" placeholder="Procurar instituição ou localidade" class="w-full border border-navy-950/20 bg-paper px-4 py-2.5 text-sm outline-none transition focus:border-teal-500">
                </label>
            </div>

            <div class="mt-12 grid gap-10 lg:grid-cols-[220px_1fr] lg:gap-14">
                <nav class="portfolio-nav lg:sticky lg:top-28 lg:self-start" aria-label="Províncias">
                    <p class="mb-3 font-mono text-[11px] uppercase tracking-wider text-grey-400">Províncias</p>
                    <ul class="flex gap-2 overflow-x-auto pb-2 lg:block lg:space-y-1 lg:overflow-visible lg:pb-0">
                        @foreach ($page->items('portfolio') as $province)
                            @php $provinceSlug = \Illuminate\Support\Str::slug($province['name'] ?? ''); @endphp
                            <li>
                                <a href="#provincia-{{ $provinceSlug }}" class="portfolio-nav-link whitespace-nowrap border-l-2 border-transparent px-3 py-2 text-sm text-grey-600 transition hover:text-navy-900 lg:block" data-province="{{ $provinceSlug }}">
                                    {{ $province['name'] ?? '' }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>

                <div class="space-y-16">
                    @foreach ($page->items('portfolio') as $province)
                        @php $provinceSlug = \Illuminate\Support\Str::slug($province['name'] ?? ''); @endphp
                        <article id="provincia-{{ $provinceSlug }}" class="portfolio-province scroll-mt-32" data-province="{{ $provinceSlug }}">
                            <div class="mb-6 flex items-end justify-between gap-4 border-b border-navy-950/10 pb-4">
                                <div>
                                    <span class="font-mono text-[11px] uppercase tracking-wider text-coral-500">Província</span>
                                    <h3 class="mt-1 text-2xl font-semibold md:text-3xl">{{ $province['name'] ?? '' }}</h3>
                                </div>
                                <span class="font-mono text-xs text-grey-400">{{ count($province['groups'] ?? []) }} instituições</span>
                            </div>

                            <div class="space-y-6">
                                @foreach ($province['groups'] ?? [] as $group)
                                    @php
                                        $places = array_values(array_filter(array_map('trim', explode(',', (string) ($group['places'] ?? '')))));
                                    @endphp
                                    <div class="portfolio-group reveal border border-navy-950/10 bg-paper p-5 md:p-6" data-sector="{{ $group['sector'] ?? '' }}" data-search="{{ mb_strtolower(($group['client'] ?? '').' '.($group['places'] ?? '').' '.($province['name'] ?? '')) }}">
                                        <div class="flex items-start gap-4">
                                            <x-client-mark :name="$group['client'] ?? ''" :logo="$group['logo'] ?? null" />
                                            <div class="min-w-0 flex-1">
                                                <p class="font-semibold">{{ $group['client'] ?? '' }}</p>
                                                @if (($group['client'] ?? '') === 'Empresas')
                                                    <ul class="mt-4 grid gap-2 sm:grid-cols-2 xl:grid-cols-3">
                                                        @foreach ($places as $place)
                                                            <li class="flex items-center gap-3 bg-white px-3 py-2">
                                                                <x-client-mark :name="$place" size="sm" />
                                                                <span class="text-sm font-medium">{{ $place }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <ul class="mt-3 flex flex-wrap gap-2">
                                                        @foreach ($places as $place)
                                                            <li class="bg-white px-2.5 py-1 font-mono text-[11px] uppercase tracking-wide text-navy-900">{{ $place }}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
