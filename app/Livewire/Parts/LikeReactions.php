<?php

namespace App\Livewire\Parts;

use Exception;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class LikeReactions extends Component
{
    #[Reactive]
    public Model $model;

    public array $availableTypes;
    public bool $showCounts = true;
    public string $layout = 'horizontal'; // horizontal, vertical, compact
    public bool $allowMultiple = false; // Allow multiple reactions or single

    public function mount(
        Model  $model,
        array  $types = null,
        bool   $showCounts = true,
        string $layout = 'horizontal',
        bool   $allowMultiple = false
    ): void
    {
        $this->model = $model;
        $this->availableTypes = $types ?? [
            Like::TYPE_LIKE,
            Like::TYPE_LOVE,
            Like::TYPE_LAUGH,
            Like::TYPE_WOW,
            Like::TYPE_SAD,
            Like::TYPE_ANGRY
        ];
        $this->showCounts = $showCounts;
        $this->layout = $layout;
        $this->allowMultiple = $allowMultiple;
    }

    public function toggleReaction(string $type): void
    {
        // Check if reactions are enabled


        // Check authentication
        if (!auth()->check()) {
            Notification::make()
                ->danger()
                ->title('Authentication Required')
                ->body('You need to log in to react to this content.')
                ->send();
            return;
        }

        $user = auth()->user();

        try {
            if (!$this->allowMultiple) {
                // Single reaction mode: remove existing reactions first
                foreach ($this->availableTypes as $existingType) {
                    if ($this->model->likedBy($user, $existingType)) {
                        $this->model->removeLike($user, $existingType);
                    }
                }
            }

            // Toggle the clicked reaction
            $result = $this->model->toggleLike($user, $type);

            // Refresh the model
            $this->model->refresh();

            // Show notification
            $this->showReactionNotification($type, $result);

        } catch (Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Something went wrong. Please try again later.')
                ->send();

            logger()->error('Reaction error: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'model_type' => get_class($this->model),
                'model_id' => $this->model->id,
                'reaction_type' => $type
            ]);
        }
    }

    /**
     * Show reaction notification
     */
    private function showReactionNotification(string $type, string $result): void
    {
        $emoji = $this->getReactionEmoji($type);
        $action = $result === 'liked' ? 'added' : 'removed';

        Notification::make()
            ->success()
            ->title("Reaction {$action}")
            ->body("You {$action} your {$emoji} reaction.")
            ->duration(1500)
            ->send();
    }

    /**
     * Get reaction emoji
     */
    public function getReactionEmoji(string $type): string
    {
        return match ($type) {
            'like' => '👍',
            'love' => '❤️',
            'laugh' => '😂',
            'wow' => '😮',
            'sad' => '😢',
            'angry' => '😠',
            'dislike' => '👎',
            default => '👍',
        };
    }

    /**
     * Get user's current reaction
     */
    public function getUserReactionProperty(): ?string
    {
        if (!auth()->check()) {
            return null;
        }

        foreach ($this->availableTypes as $type) {
            if ($this->model->likedBy(auth()->user(), $type)) {
                return $type;
            }
        }

        return null;
    }

    /**
     * Get all user's reactions (for multiple mode)
     */
    public function getUserReactionsProperty(): array
    {
        if (!auth()->check()) {
            return [];
        }

        $reactions = [];
        foreach ($this->availableTypes as $type) {
            if ($this->model->likedBy(auth()->user(), $type)) {
                $reactions[] = $type;
            }
        }

        return $reactions;
    }

    /**
     * Get reaction counts for all types
     */
    public function getReactionCountsProperty(): array
    {
        $counts = [];
        foreach ($this->availableTypes as $type) {
            $counts[$type] = $this->model->getLikeCount($type);
        }
        return $counts;
    }

    /**
     * Get total reactions count
     */
    public function getTotalReactionsProperty(): int
    {
        return array_sum($this->reactionCounts);
    }

    /**
     * Get reaction label
     */
    public function getReactionLabel(string $type): string
    {
        return match ($type) {
            'like' => 'Like',
            'love' => 'Love',
            'laugh' => 'Haha',
            'wow' => 'Wow',
            'sad' => 'Sad',
            'angry' => 'Angry',
            'dislike' => 'Dislike',
            default => ucfirst($type),
        };
    }

    /**
     * Get reaction color
     */
    public function getReactionColor(string $type): string
    {
        return match ($type) {
            'like' => 'text-blue-500',
            'love' => 'text-red-500',
            'laugh' => 'text-yellow-500',
            'wow' => 'text-purple-500',
            'sad' => 'text-blue-600',
            'angry' => 'text-orange-500',
            'dislike' => 'text-gray-600',
            default => 'text-gray-500',
        };
    }

    /**
     * Check if reaction is active
     */
    public function isReactionActive(string $type): bool
    {
        if ($this->allowMultiple) {
            return in_array($type, $this->userReactions);
        }

        return $this->userReaction === $type;
    }

    /**
     * Get most popular reactions (top 3)
     */
    public function getTopReactionsProperty(): array
    {
        $counts = $this->reactionCounts;
        arsort($counts);

        return array_slice($counts, 0, 3, true);
    }

    public function render()
    {
        return view('livewire.parts.like-reactions');
    }
}
