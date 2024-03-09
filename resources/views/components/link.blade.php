@php
    $classes = "text-xs text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 font-bold"
@endphp

<a {{ $attributes->merge(['class' => $classes, 'href' => $enlace])}}>
    {{ $slot }}
</a>