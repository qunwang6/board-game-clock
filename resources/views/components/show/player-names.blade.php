@props([
    'minimumPlayers',
    'maximumPlayers',
])

<x-show 
    show="player-names"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    <x-button.green 
        x-show="players.length < {{ $maximumPlayers }}" 
        @click="addPlayer()"
        class="flex justify-center items-center gap-2 w-96 mb-4 text-xl md:text-2xl"
        >
        <x-fas-plus class="inline-block mt-px h-6 w-6" />
        {{ __('Add Player') }}        
    </x-button.green>

    <template x-for="(player, index) in players">
        <div class="flex justify-center items-center gap-2 w-96">
            <x-input
                type="text"
                x-model="player.name" 
                class="grow"
                />
            <x-button.red 
                x-show="players.length > {{ $minimumPlayers }}" 
                @click="removePlayer(index)"
                >
                <x-fas-times class="inline-block h-6 w-6" />
            </x-button.red>
        </div>
    </template>

    <div class="flex justify-center items-center gap-2 mt-4 font-semibold">
        <x-button.orange 
            @click="changeShow('number-of-players')"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            <x-fas-angle-left class="inline-block mt-px h-6 w-6" />
            {{ __('Back') }}
        </x-button.orange>
        <x-button.orange 
            @click="changeShow('time-control')"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Next') }}
            <x-fas-angle-right class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </div>

</x-show>