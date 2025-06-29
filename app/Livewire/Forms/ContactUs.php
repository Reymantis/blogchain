<?php

namespace App\Livewire\Forms;

use App\Mail\ContactUsForm;
use Exception;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;

class ContactUs extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255),

                TextInput::make('subject')
                    ->label('Subject')
                    ->required()
                    ->maxLength(255),

                Textarea::make('message')
                    ->label('Message')
                    ->rows(6)
                    ->autosize()
                    ->required()
                    ->maxLength(2000),
            ])
            ->statePath('data');
    }

    public function sendEmail(): void
    {
        $data = $this->form->getState();

        try {
            // Send emails
            Mail::to(config('mail.from.address'))->send(new ContactUsForm($data));

            // Show success notification
            Notification::make()
                ->title('Message Sent Successfully!')
                ->body('Thank you for your message. We will get back to you soon.')
                ->success()
                ->send();

            // Reset form
            $this->form->fill();
            $this->data = [];

        } catch (Exception $e) {
            // Show error notification
            Notification::make()
                ->title('Error Sending Message')
                ->body('There was an error sending your message. Please try again later.')
                ->danger()
                ->send();

            // Log the error
            Log::error('Contact form error: '.$e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.forms.contact-us');
    }
}
