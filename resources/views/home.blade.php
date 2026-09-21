@extends('layouts.site')

@section('title', 'Wecomp, engenharia de segurança e conformidade legal')
@section('description', 'Engenharia de riscos, segurança contra incêndios, segurança eletrónica e SHST em conformidade com a legislação angolana.')

@section('content')
    <section class="relative isolate min-h-dvh overflow-hidden bg-navy-950 text-white">
        <img src="{{ asset('images/hero-home.jpg') }}" alt="" class="absolute inset-0 -z-20 size-full object-cover">
        <div class="absolute inset-0 -z-10 bg-navy-950/25"></div>
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-navy-950/85 via-transparent to-navy-950/45"></div>

        <div class="container-wide flex min-h-dvh flex-col justify-between pb-12 pt-32 lg:pb-[clamp(48px,7vh,76px)] lg:pt-[clamp(150px,30vh,360px)]">
            <h1 class="max-w-[16ch] font-display text-[clamp(2.5rem,5.05vw,6rem)] font-medium leading-[1.02] tracking-[-0.02em]">
                Segurança que aguenta o escrutínio legal e o dia a dia da operação.
            </h1>

            <div class="mt-12 flex flex-col gap-10 lg:mt-16 lg:gap-12 xl:flex-row xl:items-end xl:justify-between xl:gap-16">
                <ul class="grid gap-6 sm:grid-cols-2 xl:flex xl:gap-10 2xl:gap-[73px]">
                    @foreach ([
                        ['100+', 'Pontos operacionais'],
                        ['21', 'Províncias e municípios'],
                        ['4', 'Instituições bancárias'],
                        ['30+', 'Empresas de referência'],
                    ] as [$number, $label])
                        <li class="flex items-center gap-4">
                            <span class="counter grid size-14 shrink-0 place-items-center bg-coral-500 font-display text-[17px] font-bold" data-value="{{ $number }}">{{ $number }}</span>
                            <span class="max-w-[182px] font-display text-[13px] font-medium uppercase leading-5 tracking-[0.06em] lg:text-[15px]">{{ $label }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="xl:w-[409px] xl:shrink-0">
                    <p class="max-w-[409px] text-base leading-6 text-white/85">Engenharia de riscos e conformidade com a legislação angolana. Incêndio, segurança eletrónica e SHST para operações que não podem parar.</p>
                    <div class="mt-8 flex flex-wrap gap-4 xl:mt-14">
                        <a href="{{ route('contact') }}" class="button-primary">Pedir consultoria</a>
                        <a href="{{ route('solutions') }}" class="button-outline">Conhecer as soluções</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">O problema</span>
                    <h2 class="section-title">Em Angola, falhar a conformidade custa mais do que o equipamento.</h2>
                </div>
                <p class="text-grey-600">Três riscos que aparecem repetidamente nas operações que auditamos, e que raramente estão no orçamento inicial.</p>
            </div>

            <div class="mt-12 grid gap-px bg-navy-950/10 lg:grid-cols-3">
                @foreach ([
                    ['RISCO 01', 'Sanção e interdição', 'Instalações sem projeto conforme o Decreto Presidencial 195/11 ficam expostas a coimas, embargos e recusa de licenciamento.'],
                    ['RISCO 02', 'Paragem operacional', 'Uma agência fechada, uma loja evacuada ou uma linha parada custa receita por hora. Sistemas mal dimensionados falham quando são necessários.'],
                    ['RISCO 03', 'Responsabilidade laboral', 'A Lei Geral do Trabalho 12/23 responsabiliza o empregador pelas condições de SHST e pela documentação dos EPIs.'],
                ] as [$number, $title, $copy])
                    <article class="reveal bg-paper p-8 lg:p-10">
                        <span class="font-mono text-xs text-coral-500">{{ $number }}</span>
                        <h3 class="mt-8 text-xl font-semibold">{{ $title }}</h3>
                        <p class="mt-4 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-white" id="solucoes">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">01. Escolha por necessidade</span>
                    <h2 class="section-title">Três frentes de engenharia, um único sistema de segurança.</h2>
                </div>
                <p class="text-grey-600">Cada solução tem um enquadramento legal e um processo próprio. Não vendemos equipamento isolado.</p>
            </div>

            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach ([
                    ['seguranca-contra-incendios', 'solucao-sci.jpg', 'Segurança Contra Incêndios', 'Deteção automática, extinção fixa e engenharia de evacuação projetadas como ecossistema.', 'DP 195/11 · NP 4386:2014'],
                    ['seguranca-eletronica', 'solucao-eletronica.jpg', 'Segurança Eletrónica', 'CCTV com análise de vídeo, controlo de acessos biométrico e deteção de intrusão.', 'Vigilância & controlo de acessos'],
                    ['shst-e-epis', 'solucao-shst.jpg', 'SHST e EPIs', 'Equipamento certificado, primeiros socorros e sinalização de saúde e segurança.', 'Lei Geral do Trabalho 12/23'],
                ] as [$slug, $image, $title, $copy, $legal])
                    <a href="{{ route('solutions.show', $slug) }}" class="content-card reveal group overflow-hidden p-0">
                        <div class="h-56 overflow-hidden bg-navy-950">
                            <img src="{{ asset('images/'.$image) }}" alt="" loading="lazy" class="size-full object-cover transition duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-7">
                            <h3 class="text-xl font-semibold">{{ $title }}</h3>
                            <p class="mt-3 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                            <p class="mt-5 font-mono text-[11px] uppercase text-teal-500">{{ $legal }}</p>
                            <span class="mt-7 block text-sm font-semibold text-coral-500">Ver solução →</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <figure class="reveal">
                <img src="{{ asset('images/metodologia-hira.jpg') }}" alt="Engenheiro de segurança a inspecionar equipamento industrial" loading="lazy" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">Levantamento HIRA em ambiente industrial</figcaption>
            </figure>
            <div class="reveal">
                <span class="section-kicker">02. Metodologia</span>
                <h2 class="section-title">Primeiro medimos o risco. Só depois falamos de equipamento.</h2>
                <p class="mt-6 text-grey-600">HIRA é uma análise técnica do local antes de qualquer proposta comercial. É o que separa um projeto de segurança de uma lista de compras.</p>
                <ul class="mt-7 space-y-4 text-sm text-grey-600">
                    @foreach ([
                        'Levantamento presencial das instalações e processos críticos',
                        'Classificação por probabilidade e severidade',
                        'Confronto com o decreto e a norma aplicáveis',
                        'Prioridade de investimento onde o risco é maior',
                    ] as $item)
                        <li class="flex gap-3"><span class="font-bold text-teal-500">✓</span>{{ $item }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('about') }}" class="mt-8 inline-flex border border-navy-950/20 px-6 py-3.5 text-sm font-semibold transition hover:border-teal-500 hover:text-teal-500">Como trabalhamos</a>
            </div>
        </div>
    </section>

    <section class="relative isolate overflow-hidden py-28 text-white">
        <img src="{{ asset('images/cobertura-nacional.jpg') }}" alt="" loading="lazy" class="absolute inset-0 -z-20 size-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-navy-950/85 via-navy-950/55 to-navy-950/20"></div>
        <div class="container-site">
            <span class="section-kicker text-teal-300">03. Presença nacional</span>
            <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">Do Luanda Sul à Lunda Norte, com a mesma equipa técnica.</h2>
            <p class="mt-6 max-w-2xl text-white/70">Capilaridade significa menor tempo de resposta e capacidade para executar projetos multi-província com o mesmo caderno de encargos.</p>
            <a href="{{ route('results') }}" class="button-outline mt-8">Explorar cobertura completa</a>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site grid items-center gap-12 lg:grid-cols-2">
            <figure class="reveal lg:order-last">
                <img src="{{ asset('images/sobre-equipa.jpg') }}" alt="Equipa técnica da Wecomp em acompanhamento de obra" loading="lazy" class="aspect-[4/3] w-full object-cover">
                <figcaption class="mt-3 font-mono text-[11px] uppercase text-grey-600">Acompanhamento técnico em instalação</figcaption>
            </figure>
            <div class="reveal">
                <span class="section-kicker">04. Sobre nós</span>
                <h2 class="section-title">A conformidade legal é o trabalho, não um selo no catálogo.</h2>
                <p class="mt-6 text-grey-600">Tratamos a segurança como continuidade da operação, não só como um centro de custo.</p>
                <ul class="mt-8 grid gap-px bg-navy-950/10 sm:grid-cols-2">
                    @foreach ([
                        ['Especialização em conformidade angolana', 'Domínio dos Decretos 227/19 e 195/11 e da Lei Geral do Trabalho 12/23.'],
                        ['Metodologia HIRA', 'Avaliação de riscos antes de qualquer implementação ou aquisição.'],
                        ['Soluções integradas', 'Incêndio, SHST e segurança eletrónica a comunicar em conjunto.'],
                        ['Experiência em setores exigentes', 'Metodologia aplicada em banca, indústria, logística e retalho.'],
                    ] as [$title, $copy])
                        <li class="bg-paper p-6">
                            <h3 class="text-base font-semibold">{{ $title }}</h3>
                            <p class="mt-2 text-sm leading-6 text-grey-600">{{ $copy }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
