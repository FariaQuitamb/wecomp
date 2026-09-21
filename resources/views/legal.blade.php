@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <x-page-hero
        :kicker="$page->get('hero_kicker', 'Informação legal')"
        :title="$page->name"
        :description="$page->meta_description"
        :image="$page->imageUrl('hero_image', 'solucoes-integradas.jpg')"
    />

    <section class="section-space">
        <article class="container-site max-w-4xl">
            @if ($page->get('notice'))
                <div class="mb-10 border-l-2 border-coral-500 bg-white p-6 text-sm leading-6 text-grey-600">
                    {{ $page->get('notice') }}
                </div>
            @endif

            <div class="cms-content">
                {!! $page->get('body') !!}
            </div>

            <p class="mt-12 border-t border-navy-950/10 pt-6 font-mono text-xs text-grey-600">Última atualização: {{ $page->updated_at?->translatedFormat('F Y') }}</p>
        </article>
    </section>
@endsection
