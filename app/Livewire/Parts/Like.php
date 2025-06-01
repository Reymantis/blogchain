<?php

namespace App\Livewire\Parts;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class Like extends Component
{
    public Model $model;


    public function mount($model)
    {
        $this->model = $model;

    }

    public function likeModel($id): void
    {
        if (!config('blogchain.enable_likes')) return;

        if (auth()->check()) {
            $userId = auth()->user();

            if (!$this->model->likedBy($userId)) {
                $this->model->addLike($userId);
            } else {
                $this->model->removelike($userId);
            }
        } else {
            Notification::make()
                ->danger()
                ->color('danger')
                ->iconColor('danger')
                ->title('You need to log in to like.')
                ->send();
        }
    }


    public function render(): View
    {
        return view('livewire.parts.like');
    }
}
