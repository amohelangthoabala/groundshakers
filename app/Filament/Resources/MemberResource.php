<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Filament\Resources\MemberResource\RelationManagers;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                ->required()
                ->label('First Name')
                ->placeholder('John')
                ->rules('required', 'string', 'max:255'),
                Forms\Components\TextInput::make('last_name')
                ->required()
                ->label('Last Name')
                ->placeholder('Doe')
                ->rules('required', 'string', 'max:255'),
                Forms\Components\TextInput::make('email')
                ->required()
                ->label('Email')
                ->rules('required', 'email', 'max:255'),
                Forms\Components\TextInput::make('phone_number')
                ->required()
                ->label('Phone Number')
                ->rules('required', 'string', 'max:255'),
                Forms\Components\Datepicker::make('date_of_birth')
                ->required()
                ->label('Date of Birth')
                ->rules('required', 'date'),
                Forms\Components\Textarea::make('address')
                ->required()
                ->label('Address')
                ->rules('required', 'string'),
                Forms\Components\Select::make('born_again')
                ->options([
                    '1' => 'Yes',
                    '0' => 'No',
                    '2' => 'Not Sure',
                ])
                ->label('Born Again'),
                Forms\Components\Checkbox::make('baptized')
                ->label('Baptized'),
                Forms\Components\Checkbox::make('active')
                ->label('Active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('date_of_birth'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\BooleanColumn::make('born_again'),
                Tables\Columns\BooleanColumn::make('baptized'),
                Tables\Columns\BooleanColumn::make('active'),
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
