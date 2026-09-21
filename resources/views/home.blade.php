@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <section class="relative isolate min-h-dvh overflow-hidden bg-navy-950 text-white">
        <img src="{{ $page->imageUrl('hero_image', 'hero-home.jpg') }}" alt="" class="absolute inset-0 -z-20 size-full object-cover">
        <div class="absolute inset-0 -z-10 bg-navy-950/25"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-navy-950/85 via-transparent to-navy-950/45"></div>

        <div class="container-wide flex min-h-dvh flex-col justify-between pb-12 pt-32 lg:pb-[clamp(48px,7vh,76px)] lg:pt-[clamp(150px,30vh,360px)]">
            <h1 class="max-w-[16ch] font-display text-[clamp(2.5rem,5.05vw,6rem)] font-medium leading-[1.02] tracking-[-0.02em]">
                {{ $page->get('hero_title') }}
            </h1>

            <div class="mt-12 flex flex-col gap-10 lg:mt-16 lg:gap-12 xl:flex-row xl:items-end xl:justify-between xl:gap-16">
                <ul class="grid gap-6 sm:grid-cols-2 xl:flex xl:gap-10 2xl:gap-[73px]">
                    @foreach ($page->items('stats') as $stat)
                        <li class="flex items-center gap-4">
                            <span class="counter grid size-14 shrink-0 place-items-center bg-coral-500 font-display text-[17px] font-bold" data-value="{{ $stat['number'] ?? '' }}">{{ $stat['number'] ?? '' }}</span>
                            <span class="max-w-[182px] font-display text-[13px] font-medium uppercase leading-5 tracking-[0.06em] lg:text-[15px]">{{ $stat['label'] ?? '' }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="xl:w-[409px] xl:shrink-0">
                    <p class="max-w-[409px] text-base leading-6 text-white/85">{{ $page->get('hero_text') }}</p>
                    <div class="mt-8 flex flex-wrap gap-4 xl:mt-14">
                        <a href="{{ route('contact') }}" class="button-primary">{{ $page->get('primary_cta') }}</a>
                        <a href="{{ route('solutions') }}" class="button-outline">{{ $page->get('secondary_cta') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">{{ $page->get('problem_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('problem_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('problem_text') }}</p>
            </div>

            <div class="mt-12 grid gap-px bg-navy-950/10 lg:grid-cols-3">
                @foreach ($page->items('risks') as $risk)
                    <article class="reveal bg-paper p-8 lg:p-10">
                        <span class="font-mono text-xs text-coral-500">{{ $risk['number'] ?? '' }}</span>
                        <h3 class="mt-8 text-xl font-semibold">{{ $risk['title'] ?? '' }}</h3>
                        <p class="mt-4 text-sm leading-6 text-grey-600">{{ $risk['text'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-white" id="solucoes">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">{{ $page->get('solutions_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('solutions_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('solutions_text') }}</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach ($solutions as $solution)
                    <a href="{{ route('solutions.show', $solution) }}" class="content-card reveal group overflow-hidden p-0">
                        <div class="h-56 overflow-hidden bg-navy-950">
                            <img src="{{ $solution->hero_image_url }}" alt="" loading="lazy" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-7">
                            <h3 class="text-xl font-semibold">{{ $solution->title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $solution->excerpt }}</p>
                            @if ($solution->legal_framework)
                                <p class="mt-5 font-mono text-[11px] uppercase text-teal-500">{{ $solution->legal_framework }}</p>
                            @endif
                            <span class="mt-7 block text-sm font-semibold text-coral-500">{{ $page->get('solutions_cta') }} →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <figure class="reveal">
                <img src="{{ $page->imageUrl('method_image', 'metodologia-hira.jpg') }}" alt="{{ $page->get('method_caption') }}" loading="lazy" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">{{ $page->get('method_caption') }}</figcaption>
            </figure>
            <div class="reveal">
                <span class="section-kicker">{{ $page->get('method_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('method_title') }}</h2>
                <p class="mt-6 text-grey-600">{{ $page->get('method_text') }}</p>
                <ul class="mt-7 space-y-4 text-sm text-grey-600">
                    @foreach ($page->items('method_items') as $item)
                        <li class="flex gap-3"><span class="font-bold text-teal-500">✓</span>{{ $item['text'] ?? '' }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('about') }}" class="mt-8 inline-flex border border-navy-950/20 px-6 py-3.5 text-sm font-semibold transition hover:border-teal-500 hover:text-teal-500">{{ $page->get('method_cta') }}</a>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden py-28 text-white">
        <img src="{{ $page->imageUrl('coverage_image', 'cobertura-nacional.jpg') }}" alt="" loading="lazy" class="absolute inset-0 -z-20 size-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-navy-950/85 via-navy-950/55 to-navy-950/20"></div>
        <div class="container-site">
            <span class="section-kicker text-teal-300">{{ $page->get('coverage_kicker') }}</span>
            <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">{{ $page->get('coverage_title') }}</h2>
            <p class="mt-6 max-w-2xl text-white/70">{{ $page->get('coverage_text') }}</p>
            <a href="{{ route('results') }}" class="button-outline mt-8">{{ $page->get('coverage_cta') }}</a>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <figure class="reveal lg:order-last">
                <img src="{{ $page->imageUrl('about_image', 'sobre-equipa.jpg') }}" alt="{{ $page->get('about_caption') }}" loading="lazy" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">{{ $page->get('about_caption') }}</figcaption>
            </figure>
            <div class="reveal">
                <span class="section-kicker">{{ $page->get('about_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('about_title') }}</h2>
                <p class="mt-6 text-grey-600">{{ $page->get('about_text') }}</p>
                <ul class="mt-8 grid gap-px bg-navy-950/10 sm:grid-cols-2">
                    @foreach ($page->items('about_points') as $point)
                        <li class="bg-paper p-6">
                            <h3 class="text-base font-semibold">{{ $point['title'] ?? '' }}</h3>
                            <p class="mt-2 text-sm leading-6 text-grey-600">{{ $point['text'] ?? '' }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
