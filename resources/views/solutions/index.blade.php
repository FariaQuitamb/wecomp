@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <x-page-hero
        :kicker="$page->get('hero_kicker')"
        :title="$page->get('hero_title')"
        :description="$page->get('hero_text')"
        :image="$page->imageUrl('hero_image', 'solucoes-integradas.jpg')"
    >
        <a href="#catalogo" class="button-primary mt-8">{{ $page->get('hero_cta') }}</a>
    </x-page-hero>

    <section id="catalogo" class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">{{ $page->get('list_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('list_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('list_text') }}</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @forelse ($solutions as $solution)
                    <a href="{{ route('solutions.show', $solution) }}" class="content-card reveal group overflow-hidden p-0">
                        <div class="h-60 overflow-hidden bg-navy-950">
                            <img src="{{ $solution->hero_image_url }}" alt="" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-7">
                            @if ($solution->eyebrow)
                                <span class="font-mono text-[11px] uppercase text-teal-500">{{ $solution->eyebrow }}</span>
                            @endif
                            <h2 class="mt-3 text-2xl font-semibold">{{ $solution->title }}</h2>
                            <p class="mt-4 text-sm leading-6 text-grey-600">{{ $solution->excerpt }}</p>
                            @if ($solution->legal_framework)
                                <p class="mt-5 font-mono text-[11px] uppercase text-teal-500">{{ $solution->legal_framework }}</p>
                            @endif
                            <span class="mt-8 block text-sm font-semibold text-coral-500">{{ $page->get('card_cta') }} →</span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full border-l-2 border-coral-500 bg-white p-7 text-grey-600">
                        {{ $page->get('empty_text') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal text-center">
                <span class="section-kicker">{{ $page->get('method_kicker') }}</span>
                <h2 class="mx-auto max-w-[22ch] text-3xl font-semibold md:text-4xl">{{ $page->get('method_title') }}</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($page->items('method_steps') as $step)
                    <article class="reveal bg-white p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $step['number'] ?? '' }}</span>
                        <h3 class="mt-8 text-lg font-semibold">{{ $step['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $step['text'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
