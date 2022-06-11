@props([
    'enable' => 'true',
])

<x-button
    {{ $attributes->merge(['class' => 'p-2 rounded-lg text-white dark:text-gray-300']) }}
    x-bind:class="{{ $enable }} 
        ? 'bg-orange-500 hover:bg-orange-400 active:bg-orange-600 dark:bg-orange-600 dark:hover:bg-orange-500 dark:active:bg-orange-700' 
        : 'cursor-default bg-gray-500 dark:bg-gray-600'"
    >
    {{ $slot }}
</x-button>