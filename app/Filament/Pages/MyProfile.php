<?php

namespace App\Filament\Pages;

use App\Models\User;
use Closure;
use Exception;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

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
    public ?array $socialData = [];


    public function mount(): void
    {
        $user = Auth::user();
        $this->editProfileForm->fill(
            $user->attributesToArray(),
        );
        $this->editPasswordForm->fill();
        $this->editSocialForm->fill(
            $user->attributesToArray(),
        );
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
                        ->disk('s3')
                        ->visibility('public')
                        ->openable() // Optional: allows viewing/downloading
                        ->downloadable() // Optional: allows downloading
                        ->preserveFilenames() // Optional: keeps original filenames
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

                    Forms\Components\TextInput::make('username')
                        ->rules([
                            'string',
                            'max:25',
                            'alpha_dash',
                            'unique:users,username,' . auth()->id(),
                        ])
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Textarea::make('bio')
                        ->label('Bio'),

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


    public function editSocialForm(Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Section::make('Social Media Links')
                ->description('Update your social media profiles')
                ->aside()
                ->schema([
                    Forms\Components\TextInput::make('website')
                        ->label('Website')
                        ->url()
                        ->placeholder('https://example.com')
                        ->prefixIcon('heroicon-o-globe-alt')
                        ->maxLength(255)
                        ->validationAttribute('website'),
                    Forms\Components\TextInput::make('social_facebook')
                        ->label('Facebook Profile')
                        ->placeholder('https://facebook.com/username or https://fb.me/username')
                        ->prefixIcon('ri-facebook-fill')
                        ->maxLength(255)
                        ->validationAttribute('Facebook profile')
                        ->rule(function () {
                            return function (string $attribute, $value, Closure $fail) {
                                if (empty($value)) return;

                                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                    $fail('Please enter a valid URL.');
                                    return;
                                }

                                if (!preg_match('/^https?:\/\/(www\.)?(facebook\.com|fb\.me)\/[a-zA-Z0-9._-]+\/?$/', $value)) {
                                    $fail('Please enter a valid Facebook profile URL (e.g., https://facebook.com/username).');
                                }
                            };
                        }),
                    Forms\Components\TextInput::make('social_x')
                        ->label('X (Twitter) Profile')
                        ->placeholder('https://x.com/username or https://twitter.com/username')
                        ->prefixIcon('ri-twitter-x-fill')
                        ->maxLength(255)
                        ->validationAttribute('X profile')
                        ->rule(function () {
                            return function (string $attribute, $value, Closure $fail) {
                                if (empty($value)) return;

                                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                    $fail('Please enter a valid URL.');
                                    return;
                                }

                                if (!preg_match('/^https?:\/\/(www\.)?(x\.com|twitter\.com)\/[a-zA-Z0-9_]+\/?$/', $value)) {
                                    $fail('Please enter a valid X/Twitter profile URL (e.g., https://x.com/username).');
                                }
                            };
                        }),
                    Forms\Components\TextInput::make('social_youtube')
                        ->label('Youtube Channel')
                        ->placeholder('https://youtube.com/@username or https://youtube.com/c/channelname')
                        ->prefixIcon('ri-youtube-fill')
                        ->maxLength(255)
                        ->validationAttribute('YouTube channel')
                        ->rule(function () {
                            return function (string $attribute, $value, Closure $fail) {
                                if (empty($value)) return;

                                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                    $fail('Please enter a valid URL.');
                                    return;
                                }

                                if (!preg_match('/^https?:\/\/(www\.)?youtube\.com\/([@c]\/[a-zA-Z0-9_-]+|channel\/[a-zA-Z0-9_-]+|user\/[a-zA-Z0-9_-]+)\/?$/', $value)) {
                                    $fail('Please enter a valid YouTube channel URL (e.g., https://youtube.com/@username).');
                                }
                            };
                        }),
                    Forms\Components\TextInput::make('social_github')
                        ->label('Github Profile')
                        ->placeholder('https://github.com/username')
                        ->prefixIcon('ri-github-fill')
                        ->maxLength(255)
                        ->validationAttribute('GitHub profile')
                        ->rule(function () {
                            return function (string $attribute, $value, Closure $fail) {
                                if (empty($value)) return;

                                if (!filter_var($value, FILTER_VALIDATE_URL)) {
                                    $fail('Please enter a valid URL.');
                                    return;
                                }

                                if (!preg_match('/^https?:\/\/(www\.)?github\.com\/[a-zA-Z0-9_-]+\/?$/', $value)) {
                                    $fail('Please enter a valid GitHub profile URL (e.g., https://github.com/username).');
                                }
                            };
                        }),
                ])
        ])
            ->model(User::class)
            ->statePath('socialData');

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

    public function saveSocial(): void
    {
        try {
            // Validate the form first
            $this->editSocialForm->validate();

            $data = $this->editSocialForm->getState();

            $user = auth()->user();
            $user->update($data);

            Notification::make()
                ->success()
                ->title('Social Media Updated')
                ->body('Your social media links have been updated successfully.')
                ->send();

        } catch (ValidationException $e) {
            // Re-throw validation exception to show field errors
            throw $e;
        } catch (Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('An error occurred while updating your social media links.')
                ->send();
        }
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
            'editSocialForm'
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
            Action::make('saveSocial')
                ->label('Update Social Media')
                ->action('saveSocial')
                ->color('info'),
        ];
    }
}
