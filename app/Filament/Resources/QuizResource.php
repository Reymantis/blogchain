<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizResource\Pages;
use App\Filament\Resources\QuizResource\RelationManagers;
use App\Models\Quiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuizResource\RelationManagers\QuestionsRelationManager;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    protected static ?string $navigationGroup = 'Quizzes';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Quiz Title'),

                Forms\Components\Textarea::make('description')
                    ->maxLength(1000)
                    ->label('Quiz Description'),
                
                Forms\Components\Select::make('difficulty')
                    ->options([
                        'easy' => 'Easy',
                        'medium' => 'Medium',
                        'hard' => 'Hard',
                    ])
                    ->label('Difficulty Level')
                    ->default('medium'),

                Forms\Components\TextInput::make('category')
                    // ->required()
                    ->maxLength(255)
                    ->label('Category'),
                Forms\Components\TextInput::make('time_limit')
                    ->minValue(0)
                    ->numeric()
                    ->maxLength(255)
                    ->label('Time Limit (in minutes)'),
            ])->columns(1);

        
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Quiz Title'),

                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->label('Description'),

                Tables\Columns\TextColumn::make('category')
                    ->label('Category'),

                Tables\Columns\TextColumn::make('difficulty')
                    ->label('Difficulty Level'),

                Tables\Columns\TextColumn::make('time_limit')
                    ->label('Time Limit (minutes)')
                    ->numeric(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            QuestionsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizzes::route('/'),
            'create' => Pages\CreateQuiz::route('/create'),
            'edit' => Pages\EditQuiz::route('/{record}/edit'),
        ];
    }
}
