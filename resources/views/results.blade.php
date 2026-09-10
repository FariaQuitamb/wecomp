@extends('layouts.site')

@section('title', 'Resultados e cobertura')
@section('description', 'Presença da Wecomp em mais de 100 pontos operacionais, 21 províncias e municípios e diferentes setores em Angola.')

@section('content')
    <x-page-hero
        kicker="Resultados e cobertura"
        title="Capacidade técnica em operações distribuídas."
        description="Mais de 100 pontos operacionais em 21 províncias e municípios, incluindo redes bancárias e projetos multi-localização."
        :image="asset('images/cobertura-nacional.jpg')"
    />

    <section class="border-b border-navy-950/10 bg-white py-8">
        <div class="container-site grid gap-px bg-navy-950/10 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ([['100+', 'Pontos operacionais'], ['21', 'Províncias e municípios'], ['4', 'Instituições bancárias'], ['30+', 'Empresas de referência']] as [$number, $label])
                <div class="bg-white p-7">
                    <span class="counter font-display text-3xl font-bold text-navy-900" data-value="{{ $number }}">{{ $number }}</span>
                    <span class="mt-1 block text-sm text-grey-600">{{ $label }}</span>
                </div>
            @endforeach
        </div>
    </section>

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_380px]">
                <div>
                    <span class="section-kicker">Presença nacional</span>
                    <h2 class="section-title">Cobertura é capacidade de resposta, não vaidade de mapa.</h2>
                </div>
                <p class="text-grey-600">Equipas familiarizadas com diferentes regiões e um caderno técnico comum permitem manter consistência em operações distribuídas.</p>
            </div>

            <div class="mt-12 flex flex-wrap gap-2" role="group" aria-label="Filtrar cobertura por setor">
                @foreach (['todos' => 'Todos', 'banca' => 'Banca', 'retalho' => 'Retalho', 'industria' => 'Indústria e saúde'] as $filter => $label)
                    <button type="button" class="coverage-filter border border-navy-950/20 px-4 py-2 text-sm font-semibold transition hover:border-teal-500 aria-pressed:border-coral-500 aria-pressed:bg-coral-500 aria-pressed:text-white" data-filter="{{ $filter }}" aria-pressed="{{ $filter === 'todos' ? 'true' : 'false' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['Luanda', 'banca', 'Banca e operações corporativas'],
                    ['Benguela', 'retalho', 'Retalho e distribuição'],
                    ['Huambo', 'banca', 'Rede bancária'],
                    ['Cabinda', 'industria', 'Indústria e logística'],
                    ['Lunda Norte', 'banca', 'Rede bancária'],
                    ['Huíla', 'retalho', 'Retalho e serviços'],
                    ['Malanje', 'banca', 'Rede bancária'],
                    ['Cuanza Sul', 'industria', 'Indústria e saúde'],
                    ['Bié', 'retalho', 'Distribuição'],
                ] as [$place, $sector, $label])
                    <article class="coverage-point reveal border border-navy-950/10 bg-white p-6" data-sector="{{ $sector }}">
                        <span class="font-mono text-[11px] uppercase text-teal-500">{{ $label }}</span>
                        <h3 class="mt-3 text-xl font-semibold">{{ $place }}</h3>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-space bg-white">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_380px]">
                <div>
                    <span class="section-kicker">Casos de referência</span>
                    <h2 class="section-title">Resultados mensuráveis antes de logótipos decorativos.</h2>
                </div>
                <p class="text-grey-600">Os estudos de caso serão publicados quando problema, intervenção e resultado estiverem validados pelo cliente.</p>
            </div>
            <div class="mt-10 border-l-2 border-coral-500 bg-paper p-7">
                <p class="font-semibold">Conteúdo em validação</p>
                <p class="mt-2 text-sm leading-6 text-grey-600">A arquitetura reserva este espaço, mas não inventa métricas nem atribui resultados sem autorização.</p>
            </div>
        </div>
    </section>
@endsection
