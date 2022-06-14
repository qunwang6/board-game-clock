## Board Game Clock

A TALL-stack website that lets users create an n-player chess clock/timer.

### Instructions
1. First set the number of players using the increase/decrease buttons.
1. Names can be set for the players by clicking the "Name" button, but this is optional.
1. Clicking "Next" in either case offers the user the choice of a Clock or Timer function.

#### Clock settings
A game clock gives each player a specific amount of time to complete all of their moves, like the clock in a game of chess.
1. The initial time is the initial amount of time given to each player at the start of the game.
1. The increment is an amount of time added to a player's clock after they have completed a turn. This is often done to prevent a player from simply losing on time.
1. The delay is an amount of time that must pass before a player's clock starts ticking on their turn.

#### Timer settings
The timer simply records the time taken by a player on their turn.
1. Choose whether to display the timer as it records or not and start the game.

#### Game 
- Settings can be reset by clicking the back arrow in the top left of the screen.
- A new game can be started at any time by clicking the hourglass in the top left of the screen.
- The delay of a player's time is highlighted by an amber clock.
- The active player's time is displayed at the top of the screen and highlighted in the clocks at the bottom in orange.
- When a turn has been completed the player must click "Next" to active the next player's turn.
- An abitrary player can be chosen for the next turn by clicking their clock at the bottom of the screen.
- If a player loses during the course of the game, they can be marked as having lost by clicking the red "X" button.
- The game will end automatically when only one player is left, but the end can be forced by clicking the chequered flag in the top left of the screen.

#### Losing on time
- If a player runs out of time, they have lost the game and are highlighted in red.
- If the active player runs out of time, the "Next" button must still be clicked to activate the next player (or another player can be selected by clicking their clock as above).

### FAQ

#### Why does the average time per move in the final statistics table not correspond with remaining clock time?

When playing with a clock (not a timer), increments and delays can confuse what may (inaccurately) appear to be the average time per move. The app continues to track total time taken independent of the clock to calculate an accurate average time per move.

