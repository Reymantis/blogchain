<div>
    <div class="inline-flex items-center"
         x-data="likeButton()"
         @trigger-confetti.window="handleConfetti($event)"
         x-init="initConfetti()">

        <button
            :id="buttonId"
            wire:click="likeModel"
            class="flex items-center space-x-2 transition-all duration-200 {{ $this->hoverEffects }} {{ $buttonClass }}"
            title="{{ $this->isLiked ? 'Unlike' : 'Like' }} this {{ class_basename($model) }}"
            wire:loading.attr="disabled"
            wire:target="likeModel"
            x-ref="likeButton"
        >
            <div
                class="flex items-center space-x-2 relative"
                wire:loading.class="animate-pulse"
                wire:target="likeModel"
            >
                <!-- Animated wrapper for scale effect -->
                <div class="transform transition-transform duration-200"
                     :class="{ 'animate-bounce': isAnimating }"
                     x-ref="iconWrapper">
                    <x-dynamic-component
                        :component="'heroicon-' . ($this->isLiked ? 's' : 'o') . '-' . str_replace(['heroicon-s-', 'heroicon-o-'], '', $this->icon)"
                        :class="$size . ' ' . $this->colorClass"
                    />
                </div>

                @if($showCount)
                    <span class="text-md font-medium transition-colors duration-200 {{ $this->isLiked ? $this->colorClass : 'text-gray-500' }}">
                    {{ $this->likeCount }}
                </span>
                @endif
            </div>
        </button>

        <!-- Canvas for confetti (positioned absolutely) -->
        <canvas x-ref="confettiCanvas"
                class="fixed inset-0 pointer-events-none z-50"
                style="display: none;">
        </canvas>
    </div>

    <!-- Add canvas-confetti script -->
    @once
        <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js"></script>
    @endonce

    <script>
        function likeButton() {
            return {
                buttonId: '{{ $this->buttonId }}',
                isAnimating: false,
                confettiInstance: null,

                initConfetti() {
                    // Create confetti instance when component initializes
                    if (typeof confetti !== 'undefined') {
                        this.confettiInstance = confetti.create(this.$refs.confettiCanvas, {
                            resize: true,
                            useWorker: true
                        });
                    }
                },

                handleConfetti(event) {
                    // Only trigger confetti for this specific button
                    if (event.detail.buttonId === this.buttonId) {
                        this.triggerConfetti(event.detail.type);
                    }
                },

                triggerConfetti(likeType = 'like') {
                    if (!this.confettiInstance || !this.$refs.likeButton) return;

                    // Show canvas
                    this.$refs.confettiCanvas.style.display = 'block';

                    // Get button position for confetti origin
                    const buttonRect = this.$refs.likeButton.getBoundingClientRect();
                    const originX = (buttonRect.left + buttonRect.width / 2) / window.innerWidth;
                    const originY = (buttonRect.top + buttonRect.height / 2) / window.innerHeight;

                    // Trigger icon animation
                    this.isAnimating = true;
                    setTimeout(() => {
                        this.isAnimating = false;
                    }, 600);

                    // Configure confetti based on like type
                    const confettiConfig = this.getConfettiConfig(likeType, originX, originY);

                    // Fire confetti
                    this.confettiInstance(confettiConfig);

                    // Hide canvas after animation
                    setTimeout(() => {
                        this.$refs.confettiCanvas.style.display = 'none';
                    }, 3000);
                },

                getConfettiConfig(likeType, originX, originY) {
                    const baseConfig = {
                        particleCount: 50,
                        spread: 60,
                        origin: {x: originX, y: originY},
                        startVelocity: 25,
                        gravity: 0.8,
                        drift: 0,
                        ticks: 300
                    };

                    // Customize colors and shapes based on like type
                    switch (likeType) {
                        case 'love':
                            return {
                                ...baseConfig,
                                colors: ['#ef4444', '#f87171', '#fca5a5', '#fecaca'],
                                shapes: ['heart'],
                                particleCount: 30,
                                spread: 45
                            };

                        case 'laugh':
                            return {
                                ...baseConfig,
                                colors: ['#eab308', '#facc15', '#fde047', '#fef08a'],
                                particleCount: 40,
                                spread: 70
                            };

                        case 'wow':
                            return {
                                ...baseConfig,
                                colors: ['#8b5cf6', '#a78bfa', '#c4b5fd', '#ddd6fe'],
                                particleCount: 60,
                                spread: 80,
                                startVelocity: 35
                            };

                        case 'angry':
                            return {
                                ...baseConfig,
                                colors: ['#ea580c', '#fb923c', '#fdba74', '#fed7aa'],
                                particleCount: 25,
                                spread: 40,
                                gravity: 1.2
                            };

                        case 'sad':
                            return {
                                ...baseConfig,
                                colors: ['#3b82f6', '#60a5fa', '#93c5fd', '#bfdbfe'],
                                particleCount: 20,
                                spread: 30,
                                gravity: 1.5,
                                drift: -0.1
                            };

                        case 'dislike':
                            return {
                                ...baseConfig,
                                colors: ['#6b7280', '#9ca3af', '#d1d5db'],
                                particleCount: 15,
                                spread: 25,
                                startVelocity: 15
                            };

                        default: // 'like'
                            return {
                                ...baseConfig,
                                colors: ['#ef4444', '#f87171', '#fca5a5', '#fecaca', '#ffffff'],
                                particleCount: 35,
                                spread: 55
                            };
                    }
                }
            }
        }
    </script>

    <style>
        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0, 0, 0);
            }
            40%, 43% {
                transform: translate3d(0, -8px, 0);
            }
            70% {
                transform: translate3d(0, -4px, 0);
            }
            90% {
                transform: translate3d(0, -2px, 0);
            }
        }

        .animate-bounce {
            animation: bounce 0.6s ease-in-out;
        }
    </style>
</div>
