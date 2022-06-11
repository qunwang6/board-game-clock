@props([
    'enable' => 'true',
])

<x-button
    {{ $attributes->merge(['class' => 'p-2 rounded-lg text-white dark:text-gray-300']) }}
    x-bind:class="{{ $enable }} 
        ? 'bg-green-500 hover:bg-green-400 active:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500 dark:active:bg-green-700' 
        : 'cursor-default bg-gray-500 dark:bg-gray-600'"
    >
    {{ $slot }}
</x-button>