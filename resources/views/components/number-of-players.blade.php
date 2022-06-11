@props([
    'minimumPlayers',
    'maximumPlayers',
])

<x-show 
    show="number-of-players"
    class="md:mt-36"
    >

    <div class="flex flex-col items-center md:flex-row md:justify-center gap-4 py-4">
        <label 
            for="number_of_players"
            class="text-xl md:text-2xl"
            >
            {{ __('How many players are playing?') }}
        </label>
        <div class="flex items-center gap-2">
            <x-orange-button 
                @click="removePlayer()"
                enable="players.length > {{ $minimumPlayers }}"
                >
                <x-fas-minus class="inline-block h-6 w-6" />
            </x-orange-button>
            <x-input 
                x-model="players.length" 
                id="number_of_players" 
                type="number" 
                class="w-24 text-right"
                disabled
                />
            <x-orange-button 
                @click="addPlayer()"
                enable="players.length < {{ $maximumPlayers }}"
                >
                <x-fas-plus class="inline-block h-6 w-6" />
            </x-orange-button>
        </div>
    </div>        

    <div class="flex justify-center items-center gap-2 mt-4 font-semibold">
        <x-orange-button 
            @click="show = 'player-names'"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Names') }}
            <x-fas-user-edit class="inline-block mt-px h-6 w-6" />
        </x-orange-button>
        <x-orange-button 
            @click="show = 'time-control'"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Next') }}
            <x-fas-angle-right class="inline-block mt-px h-6 w-6" />
        </x-orange-button>
    </div>
    
</x-show>