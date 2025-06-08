<?php

namespace App\Models;


use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail, HasMedia
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'avatar',
        'username',
        'bio',
        'social_facebook',
        'social_github',
        'social_x',
        'website'

    ];

    /** @use HasFactory<UserFactory> */
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use HasSuperAdmin;
    use SoftDeletes;
    use InteractsWithMedia;



    protected $appends = ['avatar_url'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    /**
     * Get the avatar URL attribute, fallback to ui-avatars.
     */
    public function avatarUrl(): Attribute
    {
        return Attribute::get(function () {

            if ($this->avatar) {
                // Ensure correct slash between path segments
                return asset('storage/' . ltrim($this->avatar, '/'));
            }

            // Fallback to UI-Avatars with user's name or email
            $name = urlencode($this->name ?? $this->email ?? 'User');
            return "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF";
        });
    }

    public function getAvatar(): ?string
    {
        if ($this->avatar) {
            // Ensure correct slash between path segments
            return asset('storage/' . ltrim($this->avatar, '/'));
        }

        // Fallback to UI-Avatars with user's name or email
        $name = urlencode($this->name ?? $this->email ?? 'User');
        return "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF";
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Register media collections
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('avatar')
            ->singleFile();
    }

    /**
     * Register media conversions
     */
    public function registerMediaConversions(?Media $media = null): void
    {

        $this
            ->addMediaConversion('small')
            ->fit(Fit::Crop, 100, 100)
            ->nonQueued();

        $this
            ->addMediaConversion('medium')
            ->fit(Fit::Crop, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('large')
            ->fit(Fit::Crop, 600, 600)
            ->nonQueued();
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',

        ];
    }

}
