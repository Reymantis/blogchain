<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuizCategoryResource\Pages;
use App\Filament\Resources\QuizCategoryResource\RelationManagers;
use App\Models\QuizCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuizCategoryResource extends Resource
{
    protected static ?string $model = QuizCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quiz Section';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Quiz category name'),

                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->rows(5)
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuizCategories::route('/'),
            'create' => Pages\CreateQuizCategory::route('/create'),
            'edit' => Pages\EditQuizCategory::route('/{record}/edit'),
        ];
    }
}
