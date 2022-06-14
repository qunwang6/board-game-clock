<x-show 
    show="final-statistics"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    <p class="text-xl md:text-2xl">
        {{ __('Game Over!') }}
    </p>

    <table class="block sm:table my-4 sm:my-8 mx-4 text-xl md:text-2xl">
        <thead class="block sm:table-header-group">
            <th
                class="hidden sm:table-cell px-2 md:px-6 text-left"
                >{{ __('Player') }}</th>
            <th
                x-show="clockType == 'clock'"
                class="inline-block sm:table-cell px-2 md:px-6"
                >{{ __('Clock') }}</th>
            <th
                x-show="clockType == 'timer'"
                class="inline-block sm:table-cell px-2 md:px-6"
                >{{ __('Used') }}</th>
            <th
                class="inline-block sm:table-cell px-2 md:px-6"
                >{{ __('Turns') }}</th>
            <th
                class="inline-block sm:table-cell px-2 md:px-6"
                >{{ __('Average turn') }}</th>
        </thead>
        <tbody class="block sm:table-body-group">
            <template x-for="(player, index) in [...players].sort((a, b) => (a.millisecondsUsed / (a.turns ? a.turns : 1)) - (b.millisecondsUsed / (b.turns ? b.turns : 1)))">
                <tr 
                    class="block sm:table-row"
                    :class="player.lost ? 'text-red-500 dark:text-red-600' : ''"
                    >
                    <td 
                        x-text="player.name"
                        class="block sm:table-cell px-2 md:px-6 font-semibold"
                        ></td>
                    <td 
                        x-show="clockType == 'clock'"
                        x-text="convertMilliseconds(player.milliseconds)"
                        class="inline-block sm:table-cell w-1/4 sm:w-auto px-2 md:px-6 text-center"
                        ></td>            
                    <td 
                        x-show="clockType == 'timer'"
                        x-text="convertMilliseconds(player.millisecondsUsed)"
                        class="inline-block sm:table-cell w-1/4 sm:w-auto px-2 md:px-6 text-center"
                        ></td>          
                    <td 
                        x-text="player.turns"
                        class="inline-block sm:table-cell w-1/4 sm:w-auto px-2 md:px-6 text-center"
                        ></td>      
                    <td 
                        x-text="convertMilliseconds(player.turns ? Math.round(player.millisecondsUsed / player.turns) : 0)"
                        class="inline-block sm:table-cell w-1/3 sm:w-auto px-2 md:px-6 text-center"
                        ></td>       
                </tr>
            </template>
        </tbody>
    </table>
        
    <x-show.section class="mt-4">
        <x-button.orange 
            @click="newGame()"
            class="flex justify-center items-center gap-2 w-64 sm:w-96 text-xl md:text-2xl"
            >
            {{ __('Play Again') }}
            <x-fas-hourglass-start class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

</x-show>