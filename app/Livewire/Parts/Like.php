<?php

namespace App\Livewire\Parts;

use Exception;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Like extends Component
{

    #[Reactive]
    public Model $model;

    public string $likeType = 'like';
    public bool $showCount = true;
    public string $size = 'size-6';
    public string $color = 'text-red-500';
    public string $buttonClass = '';
    public bool $showConfetti = true; // New property to control confetti

    public function mount(
        Model  $model,
        string $likeType = 'like',
        bool   $showCount = true,
        string $size = 'size-6',
        string $color = 'text-red-500',
        string $buttonClass = '',
        bool   $showConfetti = true
    ): void
    {
        $this->model = $model;
        $this->likeType = $likeType;
        $this->showCount = $showCount;
        $this->size = $size;
        $this->color = $color;
        $this->buttonClass = $buttonClass;
        $this->showConfetti = $showConfetti;
    }

    public function likeModel(): void
    {

        // Check authentication
        if (!auth()->check()) {
            Notification::make()
                ->danger()
                ->color('danger')
                ->iconColor('danger')
                ->title('Authentication Required')
                ->body('You need to log in to like this content.')
                ->send();
            return;
        }

        $user = auth()->user();
        $wasLiked = $this->model->likedBy($user, $this->likeType);

        try {
            if ($wasLiked) {
                // Unlike
                $this->model->removeLike($user, $this->likeType);
                $this->showSuccessNotification('Unliked', 'You have removed your like.');
            } else {
                // Like
                $this->model->addLike($user, $this->likeType);
                $this->showSuccessNotification('Liked', 'Thank you for your reaction!');

                // Trigger confetti effect only when liking (not unliking)
                if ($this->showConfetti) {
                    $this->dispatch('trigger-confetti', [
                        'type' => $this->likeType,
                        'buttonId' => 'like-button-' . $this->model->id . '-' . $this->likeType
                    ]);
                }
            }

            // Refresh the model to get updated counts
            $this->model->refresh();

        } catch (Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Something went wrong. Please try again later.')
                ->send();

            // Log the error for debugging
            logger()->error('Like error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'model_type' => get_class($this->model),
                'model_id' => $this->model->id,
                'like_type' => $this->likeType
            ]);
        }
    }

    /**
     * Show success notification
     */
    private function showSuccessNotification(string $title, string $body): void
    {
        Notification::make()
            ->success()
            ->title($title)
            ->body($body)
            ->duration(2000)
            ->send();
    }

    /**
     * Check if current user liked this model
     */
    public function getIsLikedProperty(): bool
    {
        return auth()->check() && $this->model->likedBy(auth()->user(), $this->likeType);
    }

    /**
     * Get like count for current type
     */
    public function getLikeCountProperty(): int
    {
        return $this->model->getLikeCount($this->likeType);
    }

    /**
     * Get unique button ID for confetti targeting
     */
    public function getButtonIdProperty(): string
    {
        return 'like-button-' . $this->model->id . '-' . $this->likeType;
    }

    /**
     * Get icon class based on like type and state
     */
    public function getIconProperty(): string
    {
        $isLiked = $this->isLiked;

        return match ($this->likeType) {
            'love' => $isLiked ? 'heroicon-s-heart' : 'heroicon-o-heart',
            'laugh' => $isLiked ? 'heroicon-s-face-smile' : 'heroicon-o-face-smile',
            'angry' => $isLiked ? 'heroicon-s-face-frown' : 'heroicon-o-face-frown',
            'dislike' => $isLiked ? 'heroicon-s-hand-thumb-down' : 'heroicon-o-hand-thumb-down',
            'sad' => $isLiked ? 'heroicon-s-face-frown' : 'heroicon-o-face-frown',
            'wow' => $isLiked ? 'heroicon-s-exclamation-circle' : 'heroicon-o-exclamation-circle',
            default => $isLiked ? 'heroicon-s-heart' : 'heroicon-o-heart',
        };
    }

    /**
     * Get color class based on like type and state
     */
    public function getColorClassProperty(): string
    {
        if (!$this->isLiked) {
            return 'text-gray-400 hover:' . $this->color;
        }

        return match ($this->likeType) {
            'love' => 'text-red-500',
            'laugh' => 'text-yellow-500',
            'angry' => 'text-orange-500',
            'dislike' => 'text-gray-600',
            'sad' => 'text-blue-500',
            'wow' => 'text-purple-500',
            default => $this->color,
        };
    }

    /**
     * Get button hover effects
     */
    public function getHoverEffectsProperty(): string
    {
        return match ($this->likeType) {
            'love' => 'hover:text-red-600 hover:scale-105',
            'laugh' => 'hover:text-yellow-600 hover:scale-105',
            'angry' => 'hover:text-orange-600 hover:scale-105',
            'dislike' => 'hover:text-gray-700 hover:scale-105',
            'sad' => 'hover:text-blue-600 hover:scale-105',
            'wow' => 'hover:text-purple-600 hover:scale-105',
            default => 'hover:text-red-600 hover:scale-105',
        };
    }

    public function render(): View
    {
        return view('livewire.parts.like');
    }
}
