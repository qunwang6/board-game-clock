@props([
    'enable' => 'true',
])

<x-button.colour
    {{ $attributes }}
    x-bind:class="{{ $enable }} 
        ? 'bg-green-500 hover:bg-green-400 active:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500 dark:active:bg-green-700' 
        : 'cursor-default bg-gray-500 dark:bg-gray-600'"
    >
    {{ $slot }}
</x-button.colour>