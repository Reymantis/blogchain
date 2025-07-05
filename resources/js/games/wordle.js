import words from "./words.txt"

function wordleGame() {
    return {



        // Word list (will be loaded from words.txt)
        wordList: [],
        wordListLoaded: false,


        // Game state
        targetWord: '',
        guesses: [],
        currentGuess: '',
        gameStatus: 'playing', // 'playing', 'won', 'lost'
        currentRow: 0,

        // Keyboard layout
        keyboardRows: [
            ['Q', 'W', 'E', 'R', 'T', 'Y', 'U', 'I', 'O', 'P'],
            ['A', 'S', 'D', 'F', 'G', 'H', 'J', 'K', 'L'],
            ['ENTER', 'Z', 'X', 'C', 'V', 'B', 'N', 'M', 'BACKSPACE']
        ],

        // Toast notification
        toast: {
            show: false,
            message: '',
            type: 'success' // 'success' or 'error'
        },

        init() {
            this.loadWordList().then(() => {
                this.resetGame();
            });
        },

        async loadWordList() {
            try {
                const response = await fetch(words); // Make sure this path is correct
                const text = await response.text();
                this.wordList = text
                    .toUpperCase()
                    .split('\n')
                    .map(word => word.trim())
                    .filter(word => word.length === 5); // Only keep 5-letter words

                this.wordListLoaded = true;
            } catch (error) {
                console.error("Failed to load word list:", error);
                this.showToast("Error loading word list!", "error");
            }
        },

        resetGame() {
            if (!this.wordListLoaded || this.wordList.length === 0) {
                this.showToast("Words not loaded yet!", "error");
                return;
            }

            this.targetWord = this.wordList[Math.floor(Math.random() * this.wordList.length)];
            this.guesses = [];
            this.currentGuess = '';
            this.gameStatus = 'playing';
            this.currentRow = 0;

            console.log('Target word:', this.targetWord); // For debugging
        },

        getCellLetter(rowIndex, colIndex) {
            if (rowIndex < this.guesses.length) {
                return this.guesses[rowIndex][colIndex] || '';
            } else if (rowIndex === this.currentRow) {
                return this.currentGuess[colIndex] || '';
            }
            return '';
        },

        getCellClass(rowIndex, colIndex) {
            const letter = this.getCellLetter(rowIndex, colIndex);

            if (rowIndex < this.guesses.length && letter) {
                const letterState = this.getLetterState(letter, colIndex, this.guesses[rowIndex]);
                return this.getStateClass(letterState) + ' border-2';
            } else if (letter) {
                return 'border-2 border-gray-400 bg-white';
            }
            return 'border-2 border-gray-300 bg-white';
        },

        getLetterState(letter, position, word) {
            if (word[position] === this.targetWord[position]) {
                return 'correct';
            }
            if (this.targetWord.includes(letter)) {
                return 'present';
            }
            return 'absent';
        },

        getStateClass(state) {
            switch (state) {
                case 'correct':
                    return 'bg-green-500 border-green-500 text-white';
                case 'present':
                    return 'bg-yellow-500 border-yellow-500 text-white';
                case 'absent':
                    return 'bg-gray-500 border-gray-500 text-white';
                default:
                    return 'border-gray-300 bg-white';
            }
        },

        getKeyboardLetterState(letter) {
            let state = 'empty';

            for (const guess of this.guesses) {
                for (let i = 0; i < guess.length; i++) {
                    if (guess[i] === letter) {
                        const letterState = this.getLetterState(letter, i, guess);
                        if (letterState === 'correct') {
                            return 'correct';
                        }
                        if (letterState === 'present' && state !== 'correct') {
                            state = 'present';
                        }
                        if (letterState === 'absent' && state === 'empty') {
                            state = 'absent';
                        }
                    }
                }
            }

            return state;
        },

        getKeyClass(key) {
            const isSpecial = key === 'ENTER' || key === 'BACKSPACE';
            let baseClass = isSpecial ? 'px-2 md:px-3' : 'w-8 md:w-10';

            if (key.length === 1) {
                const letterState = this.getKeyboardLetterState(key);
                switch (letterState) {
                    case 'correct':
                        return baseClass + ' bg-green-500 border-green-500 text-white hover:bg-green-600';
                    case 'present':
                        return baseClass + ' bg-yellow-500 border-yellow-500 text-white hover:bg-yellow-600';
                    case 'absent':
                        return baseClass + ' bg-gray-500 border-gray-500 text-white hover:bg-gray-600';
                    default:
                        return baseClass + ' bg-gray-200 hover:bg-gray-300 border border-gray-300';
                }
            }

            return baseClass + ' bg-gray-200 hover:bg-gray-300 border border-gray-300';
        },

        showToast(message, type = 'success') {
            this.toast = {
                show: true,
                message: message,
                type: type
            };

            setTimeout(() => {
                this.toast.show = false;
            }, 3000);
        },

        handleKeyPress(key) {
            if (this.gameStatus !== 'playing' || !this.wordListLoaded) return;

            if (key === 'ENTER') {
                if (this.currentGuess.length !== 5) {
                    this.showToast('Not enough letters', 'error');
                    return;
                }

                if (!this.wordList.includes(this.currentGuess)) {
                    this.showToast('Invalid word', 'error');
                    return;
                }

                this.guesses.push(this.currentGuess);
                const isCorrect = this.currentGuess === this.targetWord;
                const isGameOver = this.guesses.length >= 6;

                this.currentGuess = '';
                this.currentRow++;

                if (isCorrect) {
                    this.gameStatus = 'won';
                    this.showToast(`Congratulations! You guessed it in ${this.guesses.length} ${this.guesses.length === 1 ? 'try' : 'tries'}!`);
                } else if (isGameOver) {
                    this.gameStatus = 'lost';
                    this.showToast(`Game Over! The word was: ${this.targetWord}`, 'error');
                }
            } else if (key === 'BACKSPACE') {
                this.currentGuess = this.currentGuess.slice(0, -1);
            } else if (key.length === 1 && key.match(/[A-Z]/)) {
                if (this.currentGuess.length < 5) {
                    this.currentGuess += key;
                }
            }
        },

        handleKeyDown(event) {
            const key = event.key.toUpperCase();
            if (key === 'ENTER' || key === 'BACKSPACE' || (key.length === 1 && key.match(/[A-Z]/))) {
                event.preventDefault();
                this.handleKeyPress(key);
            }
        }
    }
}

document.addEventListener('alpine:init', () => {
    window.Alpine.data('wordleGame', wordleGame)
})
