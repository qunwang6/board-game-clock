@props([
    'enable' => 'true',
])

<x-button.colour
    {{ $attributes }}
    x-bind:class="{{ $enable }} 
        ? 'bg-red-500 hover:bg-red-400 active:bg-red-600 dark:bg-red-600 dark:hover:bg-red-500 dark:active:bg-red-700' 
        : 'cursor-default bg-gray-500 dark:bg-gray-600'"
    >
    {{ $slot }}
</x-button.colour>