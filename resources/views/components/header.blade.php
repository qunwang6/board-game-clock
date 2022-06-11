<div
    class="flex justify-between items-center px-8 py-4 border-b
        border-gray-700
        dark:border-gray-300"                
    >

    <div>
        <x-button
            @click="initialise()"
            class="
                hover:text-gray-600 active:text-gray-800
                dark:hover:text-gray-200 dark:active:text-gray-400"
            >
            <x-fas-undo-alt
                class="inline-block h-6 w-6"
                />
        </x-button>
    </div>

    <h1 class="flex justify-center items-center gap-2 font-semibold text-xl md:text-2xl
        ">
        {{ __('Board Game Clock') }}
        <a 
            href="https://github.com/michaeljmeadows/board-game-clock"
            class="transition ease-in-out duration-200
                hover:text-gray-600 active:text-gray-800
                dark:hover:text-gray-200 dark:active:text-gray-400"
            >
            <x-fab-github class="inline-block -mt-1 h-6 w-6" />
        </a>
    </h1>

    <div>
        <x-button
            type="button"
            @click="dark = false"
            class="
                text-yellow-500 hover:text-yellow-400 active:text-yellow-600
                dark:text-yellow-300 dark:hover:text-yellow-200 dark:active:text-yellow-400"
            >
            <x-fas-sun class="hidden md:inline-block h-6 w-6" />
        </x-button>
        <x-button 
            type="button"
            @click="dark = !dark"
            class="md:px-1 
                hover:text-gray-600 active:text-gray-800
                dark:hover:text-gray-200 dark:active:text-gray-400"
            >
            <x-fas-toggle-off x-show="!dark" class="inline-block h-6 w-6" />
            <x-fas-toggle-on x-cloak x-show="dark" class="inline-block h-6 w-6"/>
        </x-button>
        <x-button
            type="button"
            @click="dark = true"
            class="
                text-sky-700 hover:text-sky-600 active:text-sky-800
                dark:text-sky-300 dark:hover:text-sky-200 active:text-sky-400"
            >
            <x-fas-moon class="hidden md:inline-block h-6 w-6"/>
        </x-button>
    </div>
    
</div>