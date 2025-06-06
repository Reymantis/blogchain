<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MyProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.my-profile';
    protected static ?string $navigationLabel = 'My Profile';
    protected static ?string $title = 'My Profile';
    protected static ?string $slug = 'my-profile';

    public ?array $profileData = [];
    public ?array $passwordData = [];


    public function mount(): void
    {
        $user = Auth::user();
        $this->editProfileForm->fill(
            $user->attributesToArray(),
        );
        $this->editPasswordForm->fill();
    }


    public function editProfileForm(Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Update Profile Information')
                ->description('Update user name and email')
                ->aside()
                ->schema([

                    Forms\Components\FileUpload::make('avatar')
                        ->directory('avatars')
                        ->dehydrated()
                        ->avatar()
                        ->imageEditor()
                        ->circleCropper()
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('1:1')
                        ->imageResizeTargetWidth('200')
                        ->imageResizeTargetHeight('200')
                        ->panelAspectRatio('3:1')
                        ->uploadingMessage('Uploading avatar...')
                        ->image(),


                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                ])
        ])
            ->model(User::class)
            ->statePath('profileData');
    }

    public function editPasswordForm(Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Update Password')
                ->aside()
                ->schema([
                    Forms\Components\TextInput::make('current_password')
                        ->label('Current Password')
                        ->password()
                        ->required()
                        ->rules(['current_password']),
                    Forms\Components\TextInput::make('password')
                        ->label('New Password')
                        ->password()
                        ->required()
                        ->rules([Password::default()])
                        ->same('password_confirmation'),
                    Forms\Components\TextInput::make('password_confirmation')
                        ->label('Confirm New Password')
                        ->password()
                        ->required()
                        ->dehydrated(false),
                ])
        ])
            ->model(User::class)
            ->statePath('passwordData');
    }

    public function saveProfile(): void
    {
        $data = $this->editProfileForm->getState();

        $user = auth()->user();

        // Check if email is being changed
        if ($user->email !== $data['email']) {
            $data['email_verified_at'] = null;
            Notification::make()
                ->info()
                ->title('Email has been changed')
                ->body('Please verify your email address.')
                ->send();

            redirect()->intended(route('filament.dashboard.auth.email-verification.prompt'));

        }

        $user->update($data);

        Notification::make()
            ->success()
            ->title('Profile Updated')
            ->body('Your profile has been updated successfully.')
            ->send();
    }

    public function savePassword(): void
    {
        $data = $this->editPasswordForm->getState();

        // Verify current password
        if (!Hash::check($data['current_password'], auth()->user()->password)) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Current password is incorrect.')
                ->send();
            return;
        }

        // Update password
        auth()->user()->update([
            'password' => Hash::make($data['password'])
        ]);

        // Clear the form
        $this->editPasswordForm->fill();

        Notification::make()
            ->success()
            ->title('Password Updated')
            ->body('Your password has been updated successfully.')
            ->send();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm'
        ];
    }


    protected function getFormActions(): array
    {
        return [
            Action::make('saveProfile')
                ->label('Save Profile')
                ->action('saveProfile'),
            Action::make('savePassword')
                ->label('Update Password')
                ->action('savePassword')
                ->color('success'),
        ];
    }
}
