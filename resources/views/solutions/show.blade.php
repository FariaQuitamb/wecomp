@extends('layouts.site')

@section('title', $solution->title)
@section('description', $solution->excerpt)

@section('content')
    <x-page-hero
        :kicker="$solution->eyebrow ?: 'Solução Wecomp'"
        :title="$solution->title"
        :description="$solution->excerpt"
        :image="$solution->hero_image_url"
    >
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('contact', ['solucao' => $solution->slug]) }}" class="button-primary">Solicitar avaliação HIRA</a>
            <a href="#detalhes" class="button-outline">Conhecer a solução</a>
        </div>
    </x-page-hero>

    <section id="detalhes" class="section-space">
        <div class="container-site grid gap-12 lg:grid-cols-[1fr_360px]">
            <article class="reveal">
                <span class="section-kicker">O problema de negócio</span>
                <div class="cms-content">
                    {!! $solution->content !!}
                </div>
            </article>

            <aside class="reveal self-start border-l-2 border-coral-500 bg-white p-7">
                <span class="font-mono text-xs uppercase text-teal-500">Enquadramento legal</span>
                <p class="mt-4 text-lg font-semibold">{{ $solution->legal_framework ?: 'Legislação aplicável ao projeto' }}</p>
                <p class="mt-4 text-sm leading-6 text-grey-600">O enquadramento final depende da atividade, ocupação, risco e características das instalações.</p>
            </aside>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal">
                <span class="section-kicker">Processo de implementação</span>
                <h2 class="section-title">Da inspeção inicial à operação documentada.</h2>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['01', 'Levantamento', 'Visita técnica, inventário de ativos e identificação de riscos.'],
                    ['02', 'Dimensionamento', 'Projeto, especificação e prioridade de intervenção.'],
                    ['03', 'Execução', 'Instalação, integração e controlo de qualidade.'],
                    ['04', 'Comissionamento', 'Testes, formação, documentação e plano de manutenção.'],
                ] as [$number, $title, $copy])
                    <article class="reveal bg-white p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $number }}</span>
                        <h3 class="mt-7 text-lg font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @if ($solution->sectors->isNotEmpty())
        <section class="section-space">
            <div class="container-site">
                <span class="section-kicker">Aplicação por setor</span>
                <h2 class="section-title">Onde esta solução gera maior impacto.</h2>
                <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($solution->sectors as $sector)
                        <a href="{{ route('sectors.show', $sector) }}" class="content-card">
                            <h3 class="text-xl font-semibold">{{ $sector->title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $sector->excerpt }}</p>
                            <span class="mt-6 block text-sm font-semibold text-coral-500">Ver aplicação →</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
