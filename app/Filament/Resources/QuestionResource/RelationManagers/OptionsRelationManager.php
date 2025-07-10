<?php

namespace App\Filament\Resources\QuestionResource\RelationManagers;

use App\Filament\Resources\QuestionResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OptionsRelationManager extends RelationManager
{
    protected static string $relationship = 'options';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('option_text')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_correct')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('option_text')
            ->columns([
                Tables\Columns\TextColumn::make('option_text'),
                Tables\Columns\IconColumn::make('is_correct')
                ->icon(fn (string $state): string => $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                ->label('Correct')
                ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => QuestionResource\Pages\ListQuestions::route('/'),
            'create' => QuestionResource\Pages\CreateQuestion::route('/create'),
            'edit' => QuestionResource\Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
