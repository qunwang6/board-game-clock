<!DOCTYPE html>
<html 
    x-cloak
    x-data="{ 
        dark: true, 
        players: [],
        show: '',
        clockType: '',
        clockSettings: {
            initialSeconds: 0,
            incrementSeconds: 0,
            delaySeconds: 0,
        },
        timerSettings: {
            visible: false,
        },

        changeShow(newShow) {
            this.show = ''; 
            setTimeout(() => this.show = newShow, 300);
        },

        addPlayer() {
            if (this.players.length < {{ $maximumPlayers }}) {
                this.players.push({ 
                    name: 'Player ' + (this.players.length + 1)
                });
            }
        },
        removePlayer(index) {
            if (this.players.length > {{ $minimumPlayers }}) {
                if (index == undefined) {
                    index = this.players.length - 1;
                }
                this.players.splice(index, 1);
            }
        },

        getUnitSeconds(unit) {
            switch (unit) {
                case 'hour':
                    return 60 * 60;
                case 'minute':
                    return 60;
                default:
                    return 1;
            }
        },
        changeSectionTime(section, seconds) {
            switch (section) { 
                case 'initial':
                    if (this.clockSettings.initialSeconds >= -seconds) {
                        this.clockSettings.initialSeconds += seconds;
                        if (this.clockSettings.initialSeconds < 1) {
                            this.clockSettings.initialSeconds = 1;
                        }
                    }
                    break;
                case 'increment':
                    if (this.clockSettings.incrementSeconds >= -seconds) {
                        this.clockSettings.incrementSeconds += seconds;
                        if (this.clockSettings.incrementSeconds < 0) {
                            this.clockSettings.incrementSeconds = 0;
                        }
                    }
                    break;
                case 'delay':
                    if (this.clockSettings.delaySeconds >= -seconds) {
                        this.clockSettings.delaySeconds += seconds;
                        if (this.clockSettings.delaySeconds < 0) {
                            this.clockSettings.delaySeconds = 0;
                        }
                    }
                    break;
                default:
                    break;
            }
        },
        addClockTime(section, unit) {
            let seconds = this.getUnitSeconds(unit);            
            this.changeSectionTime(section, seconds);
        },
        removeClockTime(section, unit) {
            let seconds = this.getUnitSeconds(unit);
            this.changeSectionTime(section, -seconds);
        },

        initialise() {
            this.players = [];
            for (let i = 0; i < {{ $initialNumberOfPlayers }}; i++) {
                this.addPlayer();
            }
            this.changeShow('number-of-players');
            //this.changeShow('clock-settings');
            this.clockType = 'clock';
            this.clockSettings.initialSeconds = 600;
            this.clockSettings.incrementSeconds = 5;
            this.clockSettings.delaySeconds = 0;
            this.timerSettings.visible = false;
        },

        newGame() {
            alert('new game');
        },
    }"
    x-init="initialise()"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
    :class="dark ? 'dark' : ''"
    >

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A free, customisable n-player browser-based board game clock.">
        <meta name="keywords" content="Board Game, Clock">
        <meta name="author" content="Michael Meadows">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Board Game Clock</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f97316">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#000000">

        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    
    <body
        class="transition ease-in-out duration-200
            bg-white text-gray-700
            dark:bg-black dark:text-gray-300"
        >

        <x-header />

        <x-show.number-of-players
            :minimumPlayers="$minimumPlayers"
            :maximumPlayers="$maximumPlayers"
             />
        <x-show.player-names
            :minimumPlayers="$minimumPlayers"
            :maximumPlayers="$maximumPlayers"
             />

        <x-show.clock-or-timer />
        <x-show.clock-settings />
        <x-show.timer-settings />

    </body>

</html>
