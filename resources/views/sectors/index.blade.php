@extends('layouts.site')

@section('title', 'Setores. Wecomp')
@section('description', 'Soluções de segurança e conformidade adaptadas à banca, retalho, indústria, logística e saúde.')

@section('content')
    <x-page-hero
        kicker="Setores"
        title="Segurança adaptada ao risco de cada operação."
        description="A lei pode ser a mesma. A exposição, a continuidade e a urgência da resposta mudam de setor para setor."
        :image="asset('images/setor-industria.jpg')"
    />

    <section class="section-space">
        <div class="container-site">
            <div class="reveal grid gap-8 lg:grid-cols-[1fr_360px]">
                <div>
                    <span class="section-kicker">Escolha por setor</span>
                    <h2 class="section-title">O setor muda. O rigor técnico mantém-se.</h2>
                </div>
                <p class="text-grey-600">Cruzamos a operação, as obrigações legais e a solução técnica para chegar a uma resposta que faça sentido.</p>
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
                            <span class="mt-8 block text-sm font-semibold text-coral-500">Explorar setor →</span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-full border-l-2 border-coral-500 bg-white p-7 text-grey-600">
                        Os setores estão a ser preparados para publicação.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section-space bg-navy-900 text-white">
        <div class="container-site grid gap-10 lg:grid-cols-[1fr_420px] lg:items-center">
            <div class="reveal">
                <span class="section-kicker text-teal-300">A decisão segue o risco</span>
                <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">A mesma tecnologia resolve problemas diferentes.</h2>
            </div>
            <p class="reveal text-white/70">Num banco, o foco é a continuidade da agência. No retalho, o fluxo do público. Na indústria, a proteção do trabalhador e dos processos críticos.</p>
        </div>
    </section>
@endsection
