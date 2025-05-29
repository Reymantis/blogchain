<?php

namespace App\Livewire\Parts;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Like extends Component
{

    public Model $model;

    public function likeModel($id): void
    {

        if (auth()->check()) {
            $userId = auth()->user()->id;
            if (!$this->model->liked($userId)) {
                $this->model->like($userId);

            } else {
                $this->model->unlike($userId);

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

    public function render()
    {
        return view('livewire.parts.like');
    }
}
