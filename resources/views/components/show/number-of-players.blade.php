@props([
    'minimumPlayers',
    'maximumPlayers',
])

<x-show 
    show="number-of-players"
    >

    <div class="flex flex-col items-center md:flex-row md:justify-center gap-4 md:mt-20 py-4">
        <label 
            for="number_of_players"
            class="text-xl md:text-2xl"
            >
            {{ __('How many players are playing?') }}
        </label>
        <div class="flex items-center gap-2">
            <x-button.orange 
                @click="removePlayer()"
                enable="players.length > {{ $minimumPlayers }}"
                aria-label="Increase number of players"            
                >
                <x-fas-minus class="inline-block h-6 w-6" />
            </x-button.orange>
            <x-fake-input 
                x-text="players.length"
                class="justify-end w-20 pr-4 text-right"
                />
            <x-button.orange 
                @click="addPlayer()"
                enable="players.length < {{ $maximumPlayers }}"
                aria-label="Decrease number of players"            
                >
                <x-fas-plus class="inline-block h-6 w-6" />
            </x-button.orange>
        </div>
    </div>        

    <x-show.section class="mt-4">
        <x-button.orange 
            @click="changeShow('player-names')"
            class="flex justify-center items-center gap-2 w-32 sm:w-48 text-xl md:text-2xl"
            >
            {{ __('Names') }}
            <x-fas-user-edit class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
        <x-button.orange 
            @click="changeShow('clock-or-timer')"
            class="flex justify-center items-center gap-2 w-32 sm:w-48 text-xl md:text-2xl"
            >
            {{ __('Next') }}
            <x-fas-angle-right class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

</x-show>