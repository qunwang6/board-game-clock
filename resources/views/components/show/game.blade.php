<x-show 
    show="game"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    <div 
        class="w-11/12 sm:w-96 px-8 py-6 rounded-lg border-2"
        :class="players[activePlayer].lost 
            ? 'border-red-600 dark:border-red-600' 
            : (players[activePlayer].delayed ? 'border-amber-400 dark:border-amber-500' : 'border-orange-400 dark:border-orange-500')"
        >
        <x-button 
            x-on:click="playerLost(activePlayer)"
            class="mt-0.5 md:mt-0 float-right
                text-red-500 hover:text-red-400 active:text-red-600 dark:text-red-600 dark:hover:text-red-500 dark:active:text-red-700"
            x-bind:class="players[activePlayer].lost 
                ? 'hidden'
                : ''"    
            aria-label="Player lost"            
            >
            <x-fas-times-circle 
                class="inline-block mt-px h-10 w-10"
                />
        </x-button>
        <h1 
            class="block w-full text-2xl lg:text-4xl"
            >
            <span 
                x-text="players[activePlayer].name"
                class="block"
                ></span>
        </h1>
        <div
            x-show="clockType != 'timer' || timerSettings.visible" 
            class="block sm:w-96 smmt-4 mx-auto"
            >
            <p 
                x-text="convertMilliseconds(clockType == 'clock' ? players[activePlayer].milliseconds : players[activePlayer].millisecondsUsed)"
                class="inline-block text-4xl lg:text-5xl font-bold"
                ></p>
            <p 
                x-show="clockType == 'clock' && players[activePlayer].milliseconds < 20000"
                x-text="(Math.floor((players[activePlayer].milliseconds) % 1000) / 10).toString().padStart(2, '0')"
                class="inline-block text-lg lg:text-xl xl:text-2xl font-bold"
                ></p>
        </div>
    </div>

    <x-button.orange 
        x-show="true" 
        @click="nextPlayer()"
        class="flex justify-center items-center gap-2 w-11/12 sm:w-96 mb-4 px-8 py-10 text-2xl md:text-4xl"
        >
        {{ __('Next Player') }}        
        <x-fas-angle-right class="block md:inline-block mt-px h-10 w-10" />
    </x-button.orange>

    <div 
        class="grid gap-4 grid-cols-2 md:grid-cols-4 w-full px-4"
        >
        <template x-for="(player, index) in players">
            <div 
                class="px-3 py-1 md:px-6 md:py-4 lg:px-8 lg:py-6 rounded-lg"
                :class="activePlayer == index
					? (player.lost ? 'bg-red-500 dark:bg-red-600' : (player.delayed ? 'bg-amber-400 dark:bg-amber-500' : 'bg-orange-400 dark:bg-orange-500'))
                    : 'border md:border-2' + (player.lost ? 'border-red-600 dark:border-red-600' : 'border-orange-400 dark:border-orange-500')"
                    >
                <x-button 
                    x-on:click="playerLost(index)"
                    class="mt-0.5 md:mt-0 float-right"
                    x-bind:class="player.lost 
                        ? 'hidden'
                        : (activePlayer == index ? 'hover:text-gray-600 active:text-gray-800 dark:hover:text-gray-200 dark:active:text-gray-400' : 'text-red-500 hover:text-red-400 active:text-red-600 dark:text-red-600 dark:hover:text-red-500 dark:active:text-red-700')"
                    aria-label="Player lost"            
                    >
                    <x-fas-times-circle 
                        class="inline-block mt-px h-6 w-6 lg:h-10 lg:w-10"
                        />
                </x-button>
                <button 
                    type="button"
                    @click="activatePlayer(index)"
                    class="text-left"
                    :class="activePlayer == index ? '' : 'cursor-pointer hover:text-gray-600 active:text-gray-800 dark:hover:text-gray-200 dark:active:text-gray-400'"
                    :disabled="activePlayer == index || player.lost"
                    aria-label="Activate player"            
                    >
                    <h1 
                        class="inline-block md:block md:text-2xl"
                        >
                        <span 
                            x-text="player.name"
                            class="hidden md:block"
                            ></span>
                        <span 
                            x-text="index + 1"
                            class="block relative md:hidden -top-1 md:top-0 ml-2 mr-6 md:ml-0 md:mr-0 font-bold"
                            ></span>
                    </h1>
                    <div 
                        x-show="clockType != 'timer' || timerSettings.visible" 
                        class="inline-block md:block md:w-full text-center"
                        >
                        <p 
                            x-text="convertMilliseconds(clockType == 'clock' ? player.milliseconds : player.millisecondsUsed)"
                            class="inline-block text-2xl lg:text-3xl xl:text-4xl font-bold"
                            ></p>
                        <p 
                            x-show="clockType == 'clock' && player.milliseconds < 20000"
                            x-text="(Math.floor((player.milliseconds) % 1000) / 10).toString().padStart(2, '0')"
                            class="inline-block text-lg lg:text-xl xl:text-2xl font-bold"
                            ></p>
                    </div>
                </button>
            </div>
        </template>
    </div>

</x-show>