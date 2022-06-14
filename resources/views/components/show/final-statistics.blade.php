<x-show 
    show="final-statistics"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    <p class="text-xl md:text-2xl">
        {{ __('Game Over!') }}
    </p>

    <table class="my-8 mx-4 text-xl md:text-2xl">
        <thead>
            <th
                class="px-2 md:px-6 text-left"
                >{{ __('Player') }}</th>
            <th
                x-show="clockType == 'clock'"
                class="px-2 md:px-6"
                >{{ __('Clock') }}</th>
            <th
                x-show="clockType == 'timer'"
                class="px-2 md:px-6"
                >{{ __('Used') }}</th>
            <th
                class="px-2 md:px-6"
                >{{ __('Turns') }}</th>
            <th
                class="px-2 md:px-6"
                >{{ __('Average turn') }}</th>
        </thead>
        <tbody>
            <template x-for="(player, index) in [...players].sort((a, b) => (a.millisecondsUsed / (a.turns ? a.turns : 1)) - (b.millisecondsUsed / (b.turns ? b.turns : 1)))">
                <tr :class="player.lost ? 'text-red-500 dark:text-red-600' : ''">
                    <td 
                        x-text="player.name"
                        class="px-2 md:px-6 font-semibold"
                        ></td>
                    <td 
                        x-show="clockType == 'clock'"
                        x-text="convertMilliseconds(player.milliseconds)"
                        class="px-2 md:px-6 text-center"
                        ></td>            
                    <td 
                        x-show="clockType == 'timer'"
                        x-text="convertMilliseconds(player.millisecondsUsed)"
                        class="px-2 md:px-6 text-center"
                        ></td>          
                    <td 
                        x-text="player.turns"
                        class="px-2 md:px-6 text-center"
                        ></td>      
                    <td 
                        x-text="convertMilliseconds(player.turns ? Math.round(player.millisecondsUsed / player.turns) : 0)"
                        class="px-2 md:px-6 text-center"
                        ></td>       
                </tr>
            </template>
        </tbody>
    </table>
        
    <x-show.section class="mt-4">
        <x-button.orange 
            @click="newGame()"
            class="flex justify-center items-center gap-2 w-96 text-xl md:text-2xl"
            >
            {{ __('Play Again') }}
            <x-fas-hourglass-start class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

</x-show>