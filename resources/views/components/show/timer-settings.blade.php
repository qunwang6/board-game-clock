<x-show 
    show="timer-settings"
    class="flex flex-col justify-center items-center gap-2 md:mt-20 py-4"
    >

    <div class="flex flex-col items-center md:flex-row md:justify-center gap-12 py-4">
        <p class="text-xl md:text-2xl">
            {{ __('Do you want to see the timers?') }}
        </p>
        <div>
            <x-button
                type="button"
                @click="timerSettings.visible = true"
                class="
                    hover:text-gray-600 active:text-gray-800
                    dark:hover:text-gray-200 dark:active:text-gray-400"
                >
                <x-fas-eye class="inline-block h-6 w-6" />
            </x-button>
            <x-button 
                type="button"
                @click="timerSettings.visible = !timerSettings.visible"
                class="md:px-1 
                    hover:text-gray-600 active:text-gray-800
                    dark:hover:text-gray-200 dark:active:text-gray-400"
                >
                <x-fas-toggle-off x-show="timerSettings.visible" class="inline-block h-6 w-6" />
                <x-fas-toggle-on x-cloak x-show="!timerSettings.visible" class="inline-block h-6 w-6"/>
            </x-button>
            <x-button
                type="button"
                @click="timerSettings.visible = false"
                class="
                    hover:text-gray-600 active:text-gray-800
                    dark:hover:text-gray-200 dark:active:text-gray-400"
                >
                <x-fas-eye-slash class="inline-block h-6 w-6"/>
            </x-button>
        </div>
    </div>   

    <x-show.section class="mt-4">
        <x-button.orange 
            @click="changeShow('clock-or-timer')"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            <x-fas-angle-left class="inline-block mt-px h-6 w-6" />
            {{ __('Back') }}
        </x-button.orange>
        <x-button.orange 
            @click="newGame()"
            class="flex justify-center items-center gap-2 w-48 text-xl md:text-2xl"
            >
            {{ __('Start') }}
            <x-fas-hourglass-start class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

</x-show>