<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Closure;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Blog';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id())
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Featured Image')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                                    ->image()
                                    ->acceptedFileTypes([
                                        'image/jpeg',
                                        'image/jpg',
                                        'image/png',
                                        'image/gif',
                                        'image/webp',
                                    ])
                                    ->visibility('public')
                                    ->collection('posts')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Featured Video')
                            ->icon('heroicon-o-film')
                            ->schema([
                                Forms\Components\TextInput::make('youtube_url')
                                    ->label('Youtube Video URL')
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(191)
                                    ->url()
                                    ->nullable()
                                    ->rules([
                                        function () {
                                            return function (string $attribute, $value, Closure $fail) {
                                                // Comprehensive YouTube URL patterns
                                                $patterns = [
                                                    '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/',
                                                    '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',
                                                    '/youtube\.com\/v\/([a-zA-Z0-9_-]{11})/',
                                                    '/youtu\.be\/([a-zA-Z0-9_-]{11})/',
                                                ];
                                                $isValid = false;
                                                foreach ($patterns as $pattern) {
                                                    if (preg_match($pattern, $value, $matches)) {
                                                        $isValid = true;
                                                        break;
                                                    }
                                                }

                                                if (!$isValid) {
                                                    $fail('Please enter a valid YouTube video URL.');
                                                }
                                            };
                                        },
                                    ])
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        // Optional: Extract video ID and store it separately
                                        if ($state) {
                                            $patterns = [
                                                '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/',
                                                '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',
                                                '/youtube\.com\/v\/([a-zA-Z0-9_-]{11})/',
                                                '/youtu\.be\/([a-zA-Z0-9_-]{11})/',
                                            ];

                                            foreach ($patterns as $pattern) {
                                                if (preg_match($pattern, $state, $matches)) {
                                                    $set('video_id', $matches[1]);
                                                    break;
                                                }
                                            }
                                        }
                                    }),
                            ]),

                    ])->columnSpanFull(),

                Tabs::make('Post Details')
                    ->tabs([
                        Tabs\Tab::make('Main Content')
                            ->icon('heroicon-o-document-text')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->columnSpanFull()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(191),


                                SelectTree::make('category_id')
                                    ->label('Category')
                                    ->expandSelected(true)
                                    ->enableBranchNode(false)
                                    ->defaultOpenLevel(2)
                                    ->relationship('category', 'name', 'parent_id', function ($query) {
                                        return $query->whereNotNull('live')
                                            ->where('live', '<=', now())
                                            ->withoutGlobalScopes()
                                            ->orderBy('name');
                                    })
                                    ->required()
                                    ->searchable()
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content')
                                    ->columnSpanFull(),

                                Forms\Components\Toggle::make('live')
                                    ->default(true)
                                    ->required(),
                            ]),
                        Tabs\Tab::make('SEO')
                            ->icon('heroicon-o-bars-3-bottom-right')
                            ->schema([
                                Forms\Components\SpatieTagsInput::make('tags')
                                    ->type('posts')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('description')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),

                    ])->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                    ->collection('posts')
                    ->conversion('thumbnail')
                    ->circular()
                    ->size(42),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->hidden(!auth()->user()->isSuperAdmin())
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->badge()
                    ->sortable(),

                Tables\Columns\IconColumn::make('live')
                    ->boolean(),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
//            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
