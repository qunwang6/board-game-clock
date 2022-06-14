<x-show 
    show="clock-settings"
    class="flex flex-col justify-center items-center gap-2 py-4"
    >

    @foreach ([
        [
            'title' => 'Initial Time',
            'description' => 'Players each start with a fixed amount of time which decreases on their turn.',
            'section' => 'initial',
            'minimumSeconds' => 1,
        ],
        [
            'title' => 'Increment',
            'description' => 'A time bonus added after each player\'s turn.',
            'section' => 'increment',
            'minimumSeconds' => 0,
        ],
        [
            'title' => 'Delay',
            'description' => 'A pause before a clock starts ticking at the start of a turn.',
            'section' => 'delay',
            'minimumSeconds' => 0,
        ],
    ] as $clock)
        <div class="w-64 sm:w-96 mt-4">
            <p class="text-xl md:text-2xl">
                {{ __($clock['title']) }}
            </p>
            <p class="w-64 sm:w-96 mb-4 mt-2 text-justify">
                {{ __($clock['description']) }}
            </p>
            <x-show.section class="mt-4">
                <div class="w-16 text-center">
                    <x-button.orange 
                        @click="addClockTime('{{ $clock['section'] }}', 'hour')"
                        class="block mx-auto"
                        >
                        <x-fas-plus class="inline-block h-6 w-6" />
                    </x-button.orange>
                    <x-fake-input 
                        x-text="Math.floor(clockSettings.{{ $clock['section'] }}Seconds / (60 * 60))" 
                        class="justify-center w-16 mx-auto my-1 text-center"
                        />
                    <x-button.orange 
                        @click="removeClockTime('{{ $clock['section'] }}', 'hour')"
                        enable="clockSettings.{{ $clock['section'] }}Seconds >= (60 * 60)"
                        class="block mx-auto"
                        >
                        <x-fas-minus class="inline-block h-6 w-6" />
                    </x-button.orange>
                </div>
                :
                <div class="w-16 text-center">
                    <x-button.orange 
                        @click="addClockTime('{{ $clock['section'] }}', 'minute')"
                        class="block mx-auto"
                        >
                        <x-fas-plus class="inline-block h-6 w-6" />
                    </x-button.orange>
                    <x-fake-input 
                        x-text="(Math.floor((clockSettings.{{ $clock['section'] }}Seconds % (60 * 60)) / 60)).toString().padStart(2, '0')" 
                        class="justify-center w-16 mx-auto my-1 text-center"
                        />
                    <x-button.orange 
                        @click="removeClockTime('{{ $clock['section'] }}', 'minute')"
                        enable="clockSettings.{{ $clock['section'] }}Seconds >= 60"
                        class="block mx-auto"
                        >
                        <x-fas-minus class="inline-block h-6 w-6" />
                    </x-button.orange>
                </div>
                :
                <div class="w-16 text-center">
                    <x-button.orange 
                        @click="addClockTime('{{ $clock['section'] }}', 'second')"    
                        class="block mx-auto"
                        >
                        <x-fas-plus class="inline-block h-6 w-6" />
                    </x-button.orange>
                    <x-fake-input 
                        x-text="(clockSettings.{{ $clock['section'] }}Seconds % 60).toString().padStart(2, '0')" 
                        class="justify-center w-16 mx-auto my-1 text-center"
                        />
                    <x-button.orange 
                        @click="removeClockTime('{{ $clock['section'] }}', 'second')"
                        enable="clockSettings.{{ $clock['section'] }}Seconds > {{ $clock['minimumSeconds'] }}"
                        class="block mx-auto"
                        >
                        <x-fas-minus class="inline-block h-6 w-6" />
                    </x-button.orange>
                </div>
            </x-show.section>
        </div>
    @endforeach

    <x-show.section class="mt-6">
        <x-button.orange 
            @click="changeShow('clock-or-timer')"
            class="flex justify-center items-center gap-2 w-32 sm:w-48 text-xl md:text-2xl"
            >
            <x-fas-angle-left class="inline-block mt-px h-6 w-6" />
            {{ __('Back') }}
        </x-button.orange>
        <x-button.orange 
            @click="newGame()"
            class="flex justify-center items-center gap-2 w-32 sm:w-48 text-xl md:text-2xl"
            >
            {{ __('Start') }}
            <x-fas-hourglass-start class="inline-block mt-px h-6 w-6" />
        </x-button.orange>
    </x-show.section>

</x-show>