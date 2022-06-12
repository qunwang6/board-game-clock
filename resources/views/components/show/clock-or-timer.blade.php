@props([
    'minimumPlayers',
    'maximumPlayers',
])

<x-show 
    show="clock-or-timer"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    <x-show.section class="mt-4">
        <x-button.orange 
            @click="clockType = 'clock'; changeShow('clock-settings');"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Clock') }}
            <x-fas-undo-alt class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
        <x-button.orange 
            @click="clockType = 'timer'; changeShow('timer-settings');"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Timer') }}
            <x-fas-redo-alt class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

    <x-show.section class="mt-4">
        <x-button.orange 
            @click="changeShowBack()"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            <x-fas-angle-left class="inline-block mt-px h-6 w-6" />
            {{ __('Back') }}
        </x-button.orange>
    </x-show.section>

</x-show>