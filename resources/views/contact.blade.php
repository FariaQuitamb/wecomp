@extends('layouts.site')

@section('title', $page->title)
@section('description', $page->meta_description)

@section('content')
    <section class="relative isolate overflow-hidden bg-navy-950 pb-20 pt-36 text-white">
        <img src="{{ $page->imageUrl('hero_image', 'contacto-consultoria.jpg') }}" alt="" class="absolute inset-0 -z-20 size-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-navy-950/90 via-navy-950/65 to-navy-950/25"></div>
        <div class="container-wide">
            <span class="section-kicker text-teal-300">{{ $page->get('hero_kicker') }}</span>
            <h1 class="max-w-[16ch] text-4xl font-semibold leading-tight tracking-[-0.02em] md:text-5xl">{{ $page->get('hero_title') }}</h1>
            <p class="mt-6 max-w-xl text-lg leading-8 text-white/85">{{ $page->get('hero_text') }}</p>
        </div>
    </section>

    <section class="section-space">
        <div class="container-site grid gap-14 lg:grid-cols-[1fr_360px]">
            <div>
                @if (session('success'))
                    <div class="mb-8 border-l-4 border-teal-500 bg-white p-5 text-sm text-grey-600" role="status">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="grid gap-6 sm:grid-cols-2">
                    @csrf
                    <input type="hidden" name="source" value="{{ url()->previous() }}">
                    <div class="hidden" aria-hidden="true">
                        <label>Website <input name="website" tabindex="-1" autocomplete="off"></label>
                    </div>

                    @foreach ([
                        ['name', 'Nome', 'text', true],
                        ['company', 'Empresa', 'text', true],
                        ['phone', 'Telefone', 'tel', true],
                        ['email', 'Email', 'email', false],
                    ] as [$name, $label, $type, $required])
                        <label class="block">
                            <span class="mb-2 block text-sm font-semibold">{{ $label }}@if ($required) <span class="text-coral-500">*</span>@endif</span>
                            <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" @required($required)
                                   class="w-full border border-navy-950/20 bg-white px-4 py-3 outline-none transition focus:border-teal-500">
                            @error($name)<span class="mt-1 block text-sm text-red-700">{{ $message }}</span>@enderror
                        </label>
                    @endforeach

                    <label class="block sm:col-span-2">
                        <span class="mb-2 block text-sm font-semibold">Setor <span class="text-coral-500">*</span></span>
                        <select name="sector" required class="w-full border border-navy-950/20 bg-white px-4 py-3 outline-none transition focus:border-teal-500">
                            <option value="">Selecione o setor</option>
                            @foreach (['banca' => 'Banca e finanças', 'retalho' => 'Retalho e distribuição', 'industria' => 'Indústria e logística', 'saude' => 'Saúde', 'outro' => 'Outro'] as $value => $label)
                                <option value="{{ $value }}" @selected(old('sector', $selectedSector) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('sector')<span class="mt-1 block text-sm text-red-700">{{ $message }}</span>@enderror
                    </label>

                    <label class="block sm:col-span-2">
                        <span class="mb-2 block text-sm font-semibold">Mensagem</span>
                        <textarea name="message" rows="6" class="w-full resize-y border border-navy-950/20 bg-white px-4 py-3 outline-none transition focus:border-teal-500">{{ old('message') }}</textarea>
                        @error('message')<span class="mt-1 block text-sm text-red-700">{{ $message }}</span>@enderror
                    </label>

                    <div class="sm:col-span-2">
                        <button type="submit" class="button-primary">{{ $page->get('submit_label') }}</button>
                    </div>
                </form>
            </div>

            <aside class="space-y-8">
                <div class="border-l-2 border-coral-500 bg-white p-7">
                    <span class="font-mono text-xs uppercase text-teal-500">{{ $page->get('address_kicker') }}</span>
                    <p class="mt-4 text-sm leading-6 text-grey-600">{!! nl2br(e($page->get('address'))) !!}</p>
                </div>
                <div class="bg-navy-900 p-7 text-white">
                    <span class="font-mono text-xs uppercase text-teal-300">{{ $page->get('next_kicker') }}</span>
                    <ol class="mt-5 space-y-4 text-sm leading-6 text-white/70">
                        @foreach ($page->items('next_steps') as $index => $step)
                            <li><strong class="text-white">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}.</strong> {{ $step['text'] ?? '' }}</li>
                        @endforeach
                    </ol>
                </div>
            </aside>
        </div>
    </section>
@endsection
