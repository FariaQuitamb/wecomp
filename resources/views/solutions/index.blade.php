@extends('layouts.site')

@section('title', 'Soluções de segurança')
@section('description', 'Segurança contra incêndios, segurança eletrónica e SHST integradas a partir de uma avaliação real do risco.')

@section('content')
    <x-page-hero
        kicker="Soluções integradas"
        title="Engenharia de segurança desenhada a partir do risco."
        description="Três frentes técnicas que funcionam em conjunto: prevenção, deteção e proteção das pessoas e da operação."
        :image="asset('images/solucoes-integradas.jpg')"
    >
        <a href="#catalogo" class="button-primary mt-8">Explorar soluções</a>
    </x-page-hero>

    <section id="catalogo" class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">Da avaliação à manutenção</span>
                    <h2 class="section-title">Não instalamos equipamentos isolados. Projetamos sistemas.</h2>
                </div>
                <p class="text-grey-600">Cada solução começa com a identificação de perigos, é dimensionada segundo a legislação aplicável e termina com entrega documentada.</p>
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
                            <span class="mt-8 block text-sm font-semibold text-coral-500">Conhecer a solução →</span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full border-l-2 border-coral-500 bg-white p-7 text-grey-600">
                        As soluções estão a ser preparadas para publicação.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal text-center">
                <span class="section-kicker">Metodologia comum</span>
                <h2 class="mx-auto max-w-[22ch] text-3xl font-semibold md:text-4xl">Quatro fases para transformar risco em controlo.</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['01', 'Diagnóstico HIRA', 'Identificamos perigos, vulnerabilidades e ativos críticos.'],
                    ['02', 'Projeto', 'Dimensionamos a solução e o enquadramento legal.'],
                    ['03', 'Implementação', 'Instalamos, integramos e testamos cada componente.'],
                    ['04', 'Continuidade', 'Documentamos, formamos e planeamos a manutenção.'],
                ] as [$number, $title, $copy])
                    <article class="reveal bg-white p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $number }}</span>
                        <h3 class="mt-8 text-lg font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
