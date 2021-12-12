@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link active' : 'nav-link';
$styles = ($active ?? false)
            ? 'font-weight: bold' : '';
@endphp

<a {{ $attributes->merge(['class' => $classes, 'style' => $styles]) }}>
    {{ $slot }}
</a>
