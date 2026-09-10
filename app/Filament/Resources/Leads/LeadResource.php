<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Resources\Leads\Pages\ManageLeads;
use App\Models\Lead;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('company')
                    ->label('Empresa')
                    ->required(),
                Select::make('sector')
                    ->label('Setor')
                    ->options([
                        'banca' => 'Banca e finanças',
                        'retalho' => 'Retalho e distribuição',
                        'industria' => 'Indústria e logística',
                        'saude' => 'Saúde',
                        'outro' => 'Outro',
                    ])
                    ->required(),
                TextInput::make('phone')
                    ->label('Telefone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->email(),
                Textarea::make('message')
                    ->label('Mensagem')
                    ->columnSpanFull(),
                TextInput::make('source')
                    ->label('Origem'),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'new' => 'Novo',
                        'in_progress' => 'Em acompanhamento',
                        'qualified' => 'Qualificado',
                        'closed' => 'Fechado',
                    ])
                    ->required()
                    ->default('new'),
                DateTimePicker::make('contacted_at')
                    ->label('Contactado em'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('company')
                    ->label('Empresa')
                    ->searchable(),
                TextColumn::make('sector')
                    ->label('Setor')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('source')
                    ->label('Origem')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Estado')
                    ->badge()
                    ->searchable(),
                TextColumn::make('contacted_at')
                    ->label('Contactado em')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageLeads::route('/'),
        ];
    }
}
