<!DOCTYPE html>
<html lang="pt-AO">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Engenharia de segurança e conformidade legal para operações em Angola.')">
    <title>@yield('title', 'Wecomp') — Wecomp</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&family=IBM+Plex+Sans:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header id="site-header"
        class="fixed inset-x-0 top-0 z-50 border-b border-transparent text-white transition duration-300">
        <nav class="container-site flex h-[86px] items-center justify-between transition-all duration-300"
            aria-label="Navegação principal">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5" aria-label="Wecomp — Página inicial">
                <img src="{{ asset('images/logo.png') }}" alt="Wecomp" class="h-16">
            </a>

            <button id="nav-toggle" class="p-2 lg:hidden" type="button" aria-controls="nav-menu" aria-expanded="false">
                <span class="sr-only">Abrir menu</span>
                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    aria-hidden="true">
                    <path d="M3 6h18M3 12h18M3 18h18" />
                </svg>
            </button>

            <div id="nav-menu"
                class="invisible absolute inset-x-0 top-[72px] flex -translate-y-2 flex-col border-b border-white/15 bg-navy-950 px-7 pb-6 pt-2 opacity-0 transition lg:visible lg:static lg:translate-y-0 lg:flex-row lg:items-center lg:gap-9 lg:border-0 lg:bg-transparent lg:p-0 lg:opacity-100">
                @foreach ([['label' => 'Início', 'route' => 'home'], ['label' => 'Soluções', 'route' => 'solutions'], ['label' => 'Setores', 'route' => 'sectors'], ['label' => 'Sobre Nós', 'route' => 'about'], ['label' => 'Resultados', 'route' => 'results'], ['label' => 'Contacto', 'route' => 'contact']] as $item)
                    <a href="{{ route($item['route']) }}" @class([
                        'border-b py-3 text-sm font-medium text-white/80 transition hover:text-white lg:border-transparent lg:py-2',
                        'text-white lg:border-teal-300' => request()->routeIs($item['route'] . '*'),
                        'border-white/15' => !request()->routeIs($item['route'] . '*'),
                    ])>
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('contact') }}" class="button-primary mt-4 lg:hidden">Pedir consultoria</a>
            </div>

            <a href="{{ route('contact') }}" class="button-primary hidden lg:inline-flex">Pedir consultoria</a>
        </nav>
        <span id="scroll-progress" class="absolute bottom-[-1px] left-0 h-px w-0 bg-coral-500"></span>
    </header>

    <main>
        @yield('content')
    </main>

    <section class="relative isolate overflow-hidden bg-navy-950 py-24 text-white">
        <div aria-hidden="true" class="absolute inset-0 -z-20">
            @foreach (['hero-home.jpg', 'solucoes-integradas.jpg', 'cobertura-nacional.jpg'] as $image)
                <span class="cta-frame absolute inset-0 bg-cover bg-center opacity-0"
                    style="background-image:url('{{ asset('images/' . $image) }}')"></span>
            @endforeach
        </div>
        <div class="absolute inset-0 -z-10 bg-navy-950/80"></div>
        <div class="container-site flex flex-col justify-between gap-8 lg:flex-row lg:items-center">
            <div>
                <h2 class="max-w-[18ch] text-3xl font-semibold md:text-4xl">Vamos avaliar os riscos da sua operação.
                </h2>
                <p class="mt-4 max-w-2xl text-white/70">Consultoria estratégica com engenharia HIRA — diagnóstico
                    primeiro, proposta depois.</p>
            </div>
            <a href="{{ route('contact') }}" class="button-primary shrink-0">Pedir consultoria estratégica</a>
        </div>
    </section>

    <footer class="bg-navy-950 py-16 text-white/65">
        <div class="container-site">
            <div class="grid gap-10 border-b border-white/15 pb-12 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <span class="font-display text-xl font-bold text-white">Wecomp</span>
                    <p class="mt-4 max-w-xs text-sm leading-6">Engenharia de segurança e conformidade legal para o
                        crescimento do seu negócio.</p>
                </div>
                <div>
                    <h3 class="font-mono text-xs tracking-wider text-white">SOLUÇÕES</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a class="hover:text-teal-300" href="{{ route('solutions') }}">Segurança Contra
                                Incêndios</a></li>
                        <li><a class="hover:text-teal-300" href="{{ route('solutions') }}">Segurança Eletrónica</a></li>
                        <li><a class="hover:text-teal-300" href="{{ route('solutions') }}">SHST e EPIs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-mono text-xs tracking-wider text-white">SETORES</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a class="hover:text-teal-300" href="{{ route('sectors') }}">Banca e finanças</a></li>
                        <li><a class="hover:text-teal-300" href="{{ route('sectors') }}">Retalho e distribuição</a>
                        </li>
                        <li><a class="hover:text-teal-300" href="{{ route('sectors') }}">Indústria, logística e
                                saúde</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-mono text-xs tracking-wider text-white">EMPRESA</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a class="hover:text-teal-300" href="{{ route('about') }}">Sobre nós</a></li>
                        <li><a class="hover:text-teal-300" href="{{ route('contact') }}">Contacto</a></li>
                        <li><a class="hover:text-teal-300" href="{{ route('privacy') }}">Política de Privacidade</a>
                        </li>
                        <li><a class="hover:text-teal-300" href="{{ route('terms') }}">Termos de Utilização</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col justify-between gap-3 pt-7 font-mono text-[11px] md:flex-row">
                <span>© {{ now()->year }} Wecomp. Todos os direitos reservados.</span>
                <span>DP 227/19 · DP 195/11 · LGT 12/23 · NP 4386:2014</span>
            </div>
        </div>
    </footer>
</body>

</html>
