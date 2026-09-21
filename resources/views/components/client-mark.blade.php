@props(['name', 'logo' => null, 'size' => 'md'])

@php
    $words = preg_split('/\s+/', trim((string) $name)) ?: [];
    $skip = ['de', 'do', 'da', 'e', 'dos', 'das', 'del', 'dom'];
    $letters = [];

    foreach ($words as $word) {
        $clean = preg_replace('/[^\p{L}\p{N}]+/u', '', $word) ?? '';

        if ($clean === '' || in_array(mb_strtolower($clean), $skip, true)) {
            continue;
        }

        $letters[] = mb_strtoupper(mb_substr($clean, 0, 1));

        if (count($letters) === 2) {
            break;
        }
    }

    $initials = implode('', $letters) ?: mb_strtoupper(mb_substr((string) $name, 0, 2));

    $logoUrl = null;
    $path = is_string($logo) ? $logo : null;

    if (filled($path)) {
        if (\Illuminate\Support\Facades\Storage::disk('public')->exists($path)) {
            $logoUrl = \Illuminate\Support\Facades\Storage::disk('public')->url($path);
        } elseif (is_file(public_path('images/' . $path))) {
            $logoUrl = asset('images/' . $path);
        }
    }

    $box = match ($size) {
        'sm' => 'size-12 text-sm',
        'lg' => 'size-[72px] text-lg',
        default => 'size-14 text-base',
    };
@endphp

<span
    {{ $attributes->class([
        'relative inline-grid shrink-0 place-items-center overflow-hidden bg-navy-900 font-display font-semibold tracking-wide text-white',
        $box,
    ]) }}>
    @if ($logoUrl)
        <img src="{{ $logoUrl }}" alt="" class="size-full object-contain bg-white p-1.5">
    @else
        <span aria-hidden="true">{{ $initials }}</span>
        <span class="sr-only">{{ $name }}</span>
        <span class="absolute inset-x-0 bottom-0 h-0.5 bg-coral-500"></span>
    @endif
</span>
