@props(['kicker', 'title', 'description', 'image' => null])

<section class="relative hv-100 isolate overflow-hidden bg-navy-950 pb-20 pt-36 text-white lg:pb-24 lg:pt-40">
    @if ($image)
        <img src="{{ $image }}" alt="" class="absolute inset-0 -z-20 size-full object-cover">
    @endif
    <div class="absolute inset-0 -z-10 bg-linear-to-r from-navy-950/90 via-navy-950/65 to-navy-950/25"></div>
    <div class="absolute inset-0 -z-10 bg-linear-to-t from-navy-950/70 to-transparent"></div>
    <div class="container-wide">
        <span class="section-kicker text-teal-300">{{ $kicker }}</span>
        <h1 class="max-w-[17ch] text-4xl font-semibold leading-[1.08] tracking-[-0.025em] md:text-5xl lg:text-6xl">
            {{ $title }}</h1>
        <p class="mt-6 max-w-2xl text-lg leading-8 text-white/85">{{ $description }}</p>
        {{ $slot }}
    </div>
</section>
