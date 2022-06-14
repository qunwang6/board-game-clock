@props([
    'minimumPlayers',
    'maximumPlayers',
])

<x-show 
    show="player-names"
    class="flex flex-col justify-center items-center gap-2 md:mt-20 py-4"
    >

    <x-button.green 
        x-show="players.length < {{ $maximumPlayers }}" 
        @click="addPlayer()"
        class="flex justify-center items-center gap-2 w-64 sm:w-96 mb-4 text-xl md:text-2xl"
        >
        <x-fas-plus class="inline-block mt-px h-6 w-6" />
        {{ __('Add Player') }}        
    </x-button.green>

    <template x-for="(player, index) in players">
        <x-show.section class="sm:w-96">
            <x-input
                type="text"
                x-model="player.name" 
                maxlength="32"
                class="grow"
                />
            <x-button.red 
                x-show="players.length > {{ $minimumPlayers }}" 
                @click="removePlayer(index)"
                >
                <x-fas-times class="inline-block h-6 w-6" />
            </x-button.red>
        </x-show.section>
    </template>

    <x-show.section class="mt-4">
        <x-button.orange 
            @click="changeShow('number-of-players')"
            class="flex justify-center items-center gap-2 w-32 sm:w-48 text-xl md:text-2xl"
            >
            <x-fas-angle-left class="inline-block mt-px h-6 w-6" />
            {{ __('Back') }}
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