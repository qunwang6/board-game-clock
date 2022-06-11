@props([
    'enable' => 'true',
])

<x-button
    {{ $attributes->merge(['class' => 'p-2 rounded-lg text-white dark:text-gray-300']) }}
    x-bind:class="{{ $enable }} 
        ? 'bg-red-500 hover:bg-red-400 active:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500 dark:active:bg-red-700' 
        : 'cursor-default bg-gray-500 dark:bg-gray-600'"
    >
    {{ $slot }}
</x-button>