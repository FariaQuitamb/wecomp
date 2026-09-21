@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <x-page-hero
        :kicker="$page->get('hero_kicker')"
        :title="$page->get('hero_title')"
        :description="$page->get('hero_text')"
        :image="$page->imageUrl('hero_image', 'sobre-equipa.jpg')"
    />

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <div class="reveal">
                <span class="section-kicker">{{ $page->get('who_kicker') }}</span>
                <h2 class="section-title">{{ $page->get('who_title') }}</h2>
                <p class="mt-6 leading-7 text-grey-600">{{ $page->get('who_text') }}</p>
                <p class="mt-5 leading-7 text-grey-600">{{ $page->get('who_text_2') }}</p>
            </div>
            <figure class="reveal">
                <img src="{{ $page->imageUrl('who_image', 'metodologia-hira.jpg') }}" alt="{{ $page->get('who_caption') }}" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">{{ $page->get('who_caption') }}</figcaption>
            </figure>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="grid gap-px bg-navy-950/10 lg:grid-cols-3">
                @foreach ($page->items('values') as $value)
                    <article class="reveal bg-white p-9">
                        <span class="section-kicker">{{ $value['title'] ?? '' }}</span>
                        <p class="text-lg leading-8 text-grey-600">{{ $value['text'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">{{ $page->get('process_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('process_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('process_text') }}</p>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($page->items('process_steps') as $step)
                    <article class="reveal bg-paper p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $step['number'] ?? '' }}</span>
                        <h3 class="mt-7 text-lg font-semibold">{{ $step['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $step['text'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-navy-900 text-white">
        <div class="container-site grid gap-10 lg:grid-cols-[1fr_420px]">
            <div>
                <span class="section-kicker text-teal-300">{{ $page->get('team_kicker') }}</span>
                <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">{{ $page->get('team_title') }}</h2>
            </div>
            <p class="text-white/70">{{ $page->get('team_text') }}</p>
        </div>
    </section>
@endsection
