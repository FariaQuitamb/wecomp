@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <x-page-hero
        :kicker="$page->get('hero_kicker')"
        :title="$page->get('hero_title')"
        :description="$page->get('hero_text')"
        :image="$page->imageUrl('hero_image', 'setor-industria.jpg')"
    />

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">{{ $page->get('list_kicker') }}</span>
                    <h2 class="section-title">{{ $page->get('list_title') }}</h2>
                </div>
                <p class="text-grey-600">{{ $page->get('list_text') }}</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @forelse ($sectors as $sector)
                    <a href="{{ route('sectors.show', $sector) }}" class="content-card reveal group overflow-hidden p-0">
                        <div class="h-64 overflow-hidden bg-navy-950">
                            <img src="{{ $sector->hero_image_url }}" alt="" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-7">
                            <h2 class="text-2xl font-semibold">{{ $sector->title }}</h2>
                            <p class="mt-4 text-sm leading-6 text-grey-600">{{ $sector->excerpt }}</p>
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

    <section class="section-space bg-navy-900 text-white">
        <div class="container-site grid gap-10 lg:grid-cols-[1fr_420px] lg:items-center">
            <div class="reveal">
                <span class="section-kicker text-teal-300">{{ $page->get('close_kicker') }}</span>
                <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">{{ $page->get('close_title') }}</h2>
            </div>
            <p class="reveal text-white/70">{{ $page->get('close_text') }}</p>
        </div>
    </section>
@endsection
