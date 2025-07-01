<x-parts.card
    x-data="wordleGame()"
    x-init="init()"
    @keydown.window="handleKeyDown($event)"
    class="min-h-screen flex items-center justify-center p-4 bg-gray-100"
>
    <div class="w-full max-w-md mx-auto">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-3xl sm:text-4xl font-bold mb-2">Wordle</h1>
            <p class="text-gray-500 text-sm sm:text-base">Guess the 5-letter word in 6 tries</p>
        </div>

        <!-- Game Grid -->
        <div class="bg-white border border-gray-200 text-gray-800 rounded-lg shadow-sm p-4 sm:p-6 mb-6">
            <div class="flex flex-col gap-1.5 items-center mb-4">
                <template x-for="(row, rowIndex) in 6" :key="rowIndex">
                    <div class="flex gap-1.5">
                        <template x-for="(col, colIndex) in 5" :key="colIndex">
                            <div
                                class="w-9 h-9 sm:w-12 sm:h-12 flex items-center justify-center text-xl sm:text-2xl font-bold uppercase border-2 transition-colors duration-300"
                                :class="getCellClass(rowIndex, colIndex)"
                                x-text="getCellLetter(rowIndex, colIndex)">
                            </div>
                        </template>
                    </div>
                </template>
            </div>

            <!-- Play Again Button -->
            <div x-show="gameStatus !== 'playing'" class="text-center mb-4">
                <button
                    @click="resetGame()"
                    class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-md transition-colors text-sm sm:text-base">
                    Play Again
                </button>
            </div>

            <!-- Keyboard -->
            <div class="flex flex-col gap-1.5 mt-4">
                <template x-for="(row, rowIndex) in keyboardRows" :key="rowIndex">
                    <div class="flex gap-1 justify-center">
                        <template x-for="key in row" :key="key">
                            <button
                                @click="handleKeyPress(key)"
                                :disabled="gameStatus !== 'playing'"
                                class="h-8 sm:h-10 text-xs sm:text-sm font-semibold rounded transition-colors disabled:opacity-50 flex items-center justify-center"
                                :class="getKeyClass(key)"
                                x-text="key === 'BACKSPACE' ? '⌫' : key">
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        </div>

        <!-- Legend -->
        <div class="text-center text-xs sm:text-sm text-gray-500 px-2">
            <p>Use your keyboard or click the letters above</p>
            <div class="flex flex-wrap justify-center gap-x-3 gap-y-1 mt-2">
                <div class="flex items-center gap-1">
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-green-500 rounded"></div>
                    <span>Correct</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-yellow-500 rounded"></div>
                    <span>Wrong position</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="w-3 h-3 sm:w-4 sm:h-4 bg-gray-500 rounded"></div>
                    <span>Not in word</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div
        x-show="toast.show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50"
    >
        <div
            class="px-4 py-2 rounded-md shadow-lg text-white font-medium text-sm"
            :class="toast.type === 'error' ? 'bg-red-500' : 'bg-green-500'"
            x-text="toast.message"
        ></div>
    </div>
</x-parts.card>
