function wordleGame() {
    return {
        // Word list
        wordList: [
            "SLOPE", "SHAKY", "LEMON", "QUIET", "FLAME", "SNAKE", "QUEEN", "IMAGE", "HAUNT", "GRASP",
            "FABLE", "HAUNT", "VAPOR", "GUILT", "BRAVE", "LODGE", "HORSE", "KNEAD", "JEWEL", "WALTZ",
            "GLOVE", "SHINE", "VALVE", "QUIRK", "WALTZ", "ABBEY", "CHESS", "JOLLY", "ROAST", "DRINK",
            "KNEAD", "KNIFE", "DIZZY", "ZILCH", "VIVID", "AMBER", "IMAGE", "DEPTH", "MOOSE", "WHALE",
            "SNAKE", "ORBIT", "TOXIC", "ELBOW", "ABBEY", "VALVE", "INPUT", "LEMON", "ELBOW", "CLING",
            "WHALE", "PIANO", "ROAST", "VIGOR", "BASIL", "HORSE", "BRAVE", "VAPOR", "XENON", "NASTY",
            "LODGE", "URBAN", "DRILL", "ABBEY", "GLOVE", "GUILT", "APPLE", "JOLLY", "TIMID", "YIELD",
            "ZONAL", "DRINK", "UNITE", "HORSE", "YIELD", "ULTRA", "EVOKE", "JELLY", "APPLE", "HASTE",
            "BRAVE", "SHINE", "JELLY", "MINOR", "PUNCH", "JOUST", "QUIET", "OCEAN", "IRONY", "APPLE",
            "NERDY", "DIZZY", "MINOR", "HAUNT", "VAPOR", "KARMA", "OCEAN", "ADOBE", "URBAN", "LIVER",
            "JELLY", "PLUSH", "FLESH", "CRISP", "TOXIC", "NOBLE", "ABBEY", "LATCH", "NASTY", "BEACH",
            "JELLY", "DEPTH", "QUILT", "HASTE", "GLOVE", "FABLE", "MIRTH", "IRONY", "NERDY", "EVOKE",
            "URBAN", "HORSE", "ELOPE", "WRATH", "UNITE", "LODGE", "IMAGE", "IMAGE", "GUILT", "YOUNG",
            "SNAKE", "DRILL", "NERDY", "JEWEL", "OXIDE", "WALTZ", "RISKY", "ZEBRA", "ADOBE", "DIZZY",
            "GUILT", "DEPTH", "CRANE", "AMBER", "CRANE", "GLOVE", "DRINK", "KNIFE", "DRILL", "VIVID",
            "AMBER", "MODEL", "WOVEN", "INPUT", "LODGE", "SLOPE", "ORGAN", "KNEEL", "QUIET", "WALTZ",
            "FABLE", "NASTY", "YOUNG", "CLING", "VAPOR", "OXIDE", "ZILCH", "MOOSE", "ULTRA", "VALVE",
            "TOXIC", "EVOKE", "BASIL", "WHALE", "RAVEN", "CHANT", "IMAGE", "HOVER", "BRAVE", "BLAME",
            "HOVER", "UNITE", "CHANT", "KNEEL", "JELLY", "KNEEL", "HOVER", "ELOPE", "INBOX", "JELLY",
            "DIZZY", "TRICK", "PIANO", "BLISS", "KNEAD", "BLISS", "ROAST", "PUNCH", "ORGAN", "POUCH",
            "QUIET", "GRAPE", "PLUSH", "WOVEN", "GRAPE", "TIMID", "BLAME", "DRILL", "BASIL", "YOUTH",
            "TRICK", "URBAN", "ZEBRA", "ORBIT", "MAGIC", "PLUSH", "LEMON", "TRICK", "UNDER", "BRAVE",
            "QUIET", "MODEL", "EAGLE", "RAVEN", "PLUSH", "CRANE", "EAGLE", "FABLE", "ZONAL", "UNDER",
            "CHANT", "HASTE", "PLUSH", "CRANE", "TOXIC", "DIZZY", "WHALE", "ADOBE", "GUILT", "XENON",
            "URBAN", "WALTZ", "LEMON", "VIGOR", "POUCH", "DIZZY", "JELLY", "TOXIC", "MAGIC", "APPLE",
            "ROAST", "DIZZY", "INBOX", "APPLE", "WRATH", "QUEEN", "YUMMY", "GROOM", "PLUSH", "RAVEN",
            "MAGIC", "WOVEN", "PUNCH", "BRAVE", "PLUSH", "QUIRK", "INBOX", "ULTRA", "JOLLY", "KNEAD",
            "QUIET", "GRASP", "PLUSH", "TOXIC", "AMBER", "FROST", "SNAKE", "ADOBE", "FABLE", "FROST",
            "TIGER", "GROOM", "DIZZY", "HAUNT", "MODEL", "EAGLE", "ELOPE", "YOUTH", "FLAME", "WOVEN",
            "WHALE", "YOUTH", "DRILL", "ROAST", "WALTZ", "MANGO", "TRICK", "MODEL", "GRAPE", "KARMA",
            "FLESH", "CRANE", "FABLE", "ZEBRA", "ORBIT", "NOBLE", "KNEAD", "WALTZ", "FLAME", "XENON",
            "EAGLE", "RAVEN", "WALTZ", "INPUT", "JELLY", "APPLE", "LEMON", "HASTE", "RAVEN", "DEPTH",
            "YOUTH", "FABLE", "PUNCH", "PLUSH", "ZILCH", "URBAN", "PLUSH", "SNAKE", "WALTZ", "YUMMY",
            "SLOPE", "GUILT", "WOVEN", "DRINK", "BRAVE", "GUILT", "PLUSH", "WHALE", "RAVEN", "YOUTH",
            "FROST", "ELOPE", "CRANE", "JELLY", "BLISS", "KNIFE", "KNEAD", "GLOVE", "LEMON", "INPUT",
            "UNDER", "PLUSH", "POUCH", "ROAST", "INPUT", "VIGOR", "JOLLY", "RAVEN", "TRICK", "ADOBE",
            "BRAVE", "URBAN", "DRINK", "APPLE", "VAPOR", "JELLY", "PLUSH", "LEMON", "NASTY", "AMBER",
            "HORSE", "APPLE", "MODEL", "YIELD", "FABLE", "IMAGE", "WHALE", "BLAME", "GLASS", "DIZZY",
            "JOLLY", "JELLY", "SLOPE", "WRATH", "JOLLY", "PLUSH", "WHALE", "WALTZ", "ZEBRA", "TOXIC",
            "YUMMY", "CRANE", "ULTRA", "MANGO", "JELLY", "BRAVE", "YOUTH", "URBAN", "MODEL", "TRICK",
            "PLUSH", "HAUNT", "GRAPE", "ROAST", "HORSE", "RAVEN", "TRICK", "BRAVE", "PLUSH", "WOVEN",
            "CRANE", "APPLE", "FABLE", "YOUTH", "JOLLY", "DIZZY", "MANGO", "PLUSH", "URBAN", "LEMON",
            "WHALE", "GLOVE", "ZONAL", "NASTY", "PLUSH", "MOOSE", "AMBER", "KNEEL", "ROAST", "DIZZY",
            "TIGER", "BRAVE", "FABLE", "WALTZ", "RAVEN", "TRICK", "JOLLY", "APPLE", "ULTRA", "PLUSH",
            "QUIRK", "GLOVE", "ZEBRA", "CRANE", "PUNCH", "LEMON", "KARMA", "RAVEN", "INPUT", "GROOM",
            "JELLY", "ZEBRA", "SLOPE", "UNDER", "FLESH", "BRAVE", "NASTY", "URBAN", "ZEBRA", "APPLE",
            "FLAME", "ROAST", "WOVEN", "URBAN", "RAVEN", "JOLLY", "WALTZ", "MODEL", "ZILCH", "WALTZ",
            "HORSE", "YOUTH", "ZONAL", "JELLY", "CRANE", "FROST", "NASTY", "PLUSH", "URBAN", "RAVEN",
            "EAGLE", "DIZZY", "KNEEL", "AMBER", "YUMMY", "KNEEL", "ZILCH", "GLOVE", "TRICK", "YOUTH",
            "XENON", "ZEBRA", "APPLE", "DRINK", "GUILT", "BLAME", "HORSE", "MODEL", "ZONAL", "WALTZ"
        ],

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
            this.resetGame();
        },

        resetGame() {
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
            let baseClass = isSpecial ? 'px-3' : 'w-10';

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
            if (this.gameStatus !== 'playing') return;

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
