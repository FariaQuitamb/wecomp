@extends('layouts.site')

@section('title', 'Sobre a Wecomp')
@section('description', 'Conheça a Wecomp, a sua metodologia de engenharia de riscos e o compromisso com a conformidade legal em Angola.')

@section('content')
    <x-page-hero
        kicker="Sobre a Wecomp"
        title="Conformidade legal transformada em continuidade operacional."
        description="Uma equipa orientada por engenharia de riscos, conhecimento da legislação angolana e capacidade de execução nacional."
        :image="asset('images/sobre-equipa.jpg')"
    />

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <div class="reveal">
                <span class="section-kicker">Quem somos</span>
                <h2 class="section-title">Segurança com método, documentação e responsabilidade.</h2>
                <p class="mt-6 leading-7 text-grey-600">A Wecomp desenvolve soluções integradas de segurança contra incêndios, segurança eletrónica e SHST. Começamos pela realidade da operação e pelo risco, não pelo catálogo de equipamentos.</p>
                <p class="mt-5 leading-7 text-grey-600">Da avaliação HIRA ao comissionamento, cada etapa procura proteger pessoas, património, reputação e continuidade do negócio.</p>
            </div>
            <figure class="reveal">
                <img src="{{ asset('images/metodologia-hira.jpg') }}" alt="Engenheiro da Wecomp durante levantamento técnico" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">Engenharia aplicada no terreno</figcaption>
            </figure>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="grid gap-px bg-navy-950/10 lg:grid-cols-3">
                @foreach ([
                    ['Missão', 'Proteger pessoas, património e operações através de soluções de segurança tecnicamente rigorosas e legalmente sustentadas.'],
                    ['Visão', 'Ser uma referência angolana em engenharia de segurança, reconhecida pela capacidade técnica e pela execução consistente.'],
                    ['Valores', 'Rigor técnico, responsabilidade, transparência, prevenção e compromisso com a continuidade do cliente.'],
                ] as [$title, $copy])
                    <article class="reveal bg-white p-9">
                        <span class="section-kicker">{{ $title }}</span>
                        <p class="text-lg leading-8 text-grey-600">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">Como trabalhamos</span>
                    <h2 class="section-title">Uma decisão técnica deve deixar evidência.</h2>
                </div>
                <p class="text-grey-600">O processo reduz improvisação, permite justificar prioridades e cria documentação utilizável em auditorias e vistorias.</p>
            </div>
            <div class="mt-12 grid gap-px bg-navy-950/10 md:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['01', 'Diagnóstico', 'Levantamento das instalações, processos e ativos críticos.'],
                    ['02', 'Avaliação', 'Classificação dos riscos por probabilidade e severidade.'],
                    ['03', 'Intervenção', 'Projeto e execução conforme a prioridade identificada.'],
                    ['04', 'Evidência', 'Testes, formação, documentação e acompanhamento.'],
                ] as [$number, $title, $copy])
                    <article class="reveal bg-paper p-8">
                        <span class="font-mono text-xs text-coral-500">{{ $number }}</span>
                        <h3 class="mt-7 text-lg font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-navy-900 text-white">
        <div class="container-site grid gap-10 lg:grid-cols-[1fr_420px]">
            <div>
                <span class="section-kicker text-teal-300">Equipa e certificações</span>
                <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">Credibilidade técnica exige nomes e provas verificáveis.</h2>
            </div>
            <p class="text-white/70">Os perfis dos responsáveis técnicos, licenças e certificações serão publicados depois da validação documental pela Wecomp. Não apresentamos credenciais provisórias como factos.</p>
        </div>
    </section>
@endsection
