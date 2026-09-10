@extends('layouts.site')

@section('title', $document['title'])
@section('description', $document['description'])

@section('content')
    <x-page-hero
        kicker="Informação legal"
        :title="$document['title']"
        :description="$document['description']"
    />

    <section class="section-space">
        <article class="container-site max-w-4xl">
            <div class="mb-10 border-l-2 border-coral-500 bg-white p-6 text-sm leading-6 text-grey-600">
                {{ $document['notice'] }}
            </div>

            <div class="cms-content">
                @foreach ($document['sections'] as $section)
                    <section>
                        <h2>{{ $section['title'] }}</h2>
                        @foreach ($section['paragraphs'] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                        @if (! empty($section['items']))
                            <ul>
                                @foreach ($section['items'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </section>
                @endforeach
            </div>

            <p class="mt-12 border-t border-navy-950/10 pt-6 font-mono text-xs text-grey-600">Última atualização: setembro de 2026</p>
        </article>
    </section>
@endsection
