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
        activePlayer: 0,
        interval: null,
        timeout: null,
        isGameInProgress: false,
        isFirstTurn: true,

        changeShow(newShow) {
            this.show = ''; 
            setTimeout(() => this.show = newShow, 300);
        },

        addPlayer() {
            if (this.players.length < {{ $maximumPlayers }}) {
                this.players.push({ 
                    name: 'Player ' + (this.players.length + 1),
                    milliseconds: 0,
                    millisecondsUsed: 0,
                    lost: false,
                    delayed: false,
                    turns: 0,
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
            clearInterval(this.interval);
            clearTimeout(this.timeout);
            this.isGameInProgress = false;
            this.players = [];
            for (let i = 0; i < {{ $initialNumberOfPlayers }}; i++) {
                this.addPlayer();
            }
            this.clockType = 'clock';
            this.clockSettings.initialSeconds = {{ $initialSeconds }};
            this.clockSettings.incrementSeconds = {{ $incrementSeconds }};
            this.clockSettings.delaySeconds = {{ $delaySeconds }};
            this.timerSettings.visible = false;
            this.changeShow('number-of-players');

            //this.newGame();
        },

        newGame() {
            clearInterval(this.interval);
            clearTimeout(this.timeout);
            for (let i = 0; i < this.players.length; i++) {
                this.players[i].milliseconds = this.clockSettings.initialSeconds * 1000;
                this.players[i].millisecondsUsed = 0;
                this.players[i].lost = false;
                this.players[i].turns = 0;
            }
            this.changeShow('game');
            this.isGameInProgress = true;
            this.isFirstTurn = true;
            setTimeout(() => this.activatePlayer(0), 300);
        },

        activatePlayer(index) {
            clearInterval(this.interval);
            clearTimeout(this.timeout);
            if (!this.isFirstTurn && !this.players[this.activePlayer].lost) {
                this.players[this.activePlayer].milliseconds += (this.clockSettings.incrementSeconds * 1000);
            }
            this.isFirstTurn = false;
            this.activePlayer = index;
            this.players[this.activePlayer].turns++;
            this.players[this.activePlayer].delayed = true;
            this.timeout = setTimeout(() => {
                this.players[this.activePlayer].delayed = false;
                let ms = 10;
                this.interval = setInterval(() => {
                    if (!this.players[this.activePlayer].lost) {
                        if (this.clockType == 'clock') {
                            this.players[this.activePlayer].milliseconds -= ms;
                            if (this.players[this.activePlayer].milliseconds <= 0) {
                                this.players[this.activePlayer].milliseconds = 0;
                                this.playerLost(this.activePlayer);
                            }
                        }
                        this.players[this.activePlayer].millisecondsUsed += ms;
                    }
                    return 0;
                }, ms);
            }, this.clockSettings.delaySeconds * 1000);
        },

        nextPlayer() {
            let index = this.activePlayer;
            do {
                index++;
                if (index >= this.players.length) {
                    index = 0;
                }
            } while (this.players[index].lost);
            this.activatePlayer(index);
        },

        playerLost(index) {
            this.players[index].lost = true;
            let stillPlaying = 0;
            for (let i = 0; i < this.players.length; i++) {
                if (!this.players[i].lost) {
                    stillPlaying++;
                }
            }
            if (stillPlaying < 2) {
                this.endGame();
            }
        },

        endGame() {
            clearInterval(this.interval);
            clearTimeout(this.timeout);
            this.isGameInProgress = false;
            this.changeShow('final-statistics');
        },

        convertMilliseconds(ms) {
            let hours = Math.floor((ms / 1000) / (60 * 60));
            let minutes = (Math.floor(((ms / 1000) % (60 * 60)) / 60)).toString().padStart(2, '0');
            let seconds = (Math.floor((ms / 1000) % 60)).toString().padStart(2, '0')
            return hours + ':' + minutes + ':' + seconds;
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

        <x-show.game />

        <x-show.final-statistics />

    </body>

</html>
