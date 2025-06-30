<x-parts.card x-data="wordleGame()" x-init="init()" @keydown.window="handleKeyDown($event)" class="min-h-screen flex flex-col
items-center
justify-center p-4">
    <div class="w-full max-w-md mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold mb-2">Wordle</h1>
            <p class="text-gray-400">Guess the 5-letter word in 6 tries</p>
        </div>

        <div class="bg-white border border-gray-200 rounded-lg text-gray-600 shadow-sm p-6 mb-6">
            <!-- Game Grid -->
            <div class="flex flex-col gap-1 items-center mb-6">
                <template x-for="(row, rowIndex) in 6" :key="rowIndex">
                    <div class="flex gap-1">
                        <template x-for="(col, colIndex) in 5" :key="colIndex">
                            <div
                                class="w-14 h-14 border-2 flex items-center justify-center text-2xl font-bold uppercase transition-colors duration-300"
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
                    class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md transition-colors">
                    Play Again
                </button>
            </div>

            <!-- Keyboard -->
            <div class="flex flex-col gap-1">
                <template x-for="(row, rowIndex) in keyboardRows" :key="rowIndex">
                    <div class="flex gap-1 justify-center">
                        <template x-for="key in row" :key="key">
                            <button
                                @click="handleKeyPress(key)"
                                :disabled="gameStatus !== 'playing'"
                                class="h-12 text-sm font-semibold rounded transition-colors disabled:opacity-50"
                                :class="getKeyClass(key)"
                                x-text="key === 'BACKSPACE' ? '⌫' : key">
                            </button>
                        </template>
                    </div>
                </template>
            </div>
        </div>

        <!-- Legend -->
        <div class="text-center text-sm text-gray-500">
            <p>Use your keyboard or click the letters above</p>
            <div class="flex justify-center gap-4 mt-2">
                <div class="flex items-center gap-1">
                    <div class="w-4 h-4 bg-green-500 rounded"></div>
                    <span>Correct</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="w-4 h-4 bg-yellow-500 rounded"></div>
                    <span>Wrong position</span>
                </div>
                <div class="flex items-center gap-1">
                    <div class="w-4 h-4 bg-gray-500 rounded"></div>
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
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
        <div
            class="px-4 py-2 rounded-md shadow-lg text-white font-medium"
            :class="toast.type === 'error' ? 'bg-red-500' : 'bg-green-500'"
            x-text="toast.message">
        </div>
    </div>
</x-parts.card>
