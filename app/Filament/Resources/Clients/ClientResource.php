<?php

namespace App\Filament\Resources\Clients;

use App\Filament\Resources\Clients\Pages\CreateClient;
use App\Filament\Resources\Clients\Pages\EditClient;
use App\Filament\Resources\Clients\Pages\ListClients;
use App\Models\Client;
use App\Models\ClientLocation;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Clientes';

    protected static ?string $modelLabel = 'cliente';

    protected static ?string $pluralModelLabel = 'Clientes';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Instituição')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (?string $state, Set $set, Get $get): void {
                        if (filled($get('slug'))) {
                            return;
                        }

                        $set('slug', Str::slug((string) $state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('sector')
                    ->label('Setor')
                    ->options([
                        'banca' => 'Banca',
                        'retalho' => 'Retalho',
                        'industria' => 'Indústria e saúde',
                    ])
                    ->required(),
                TextInput::make('sort_order')
                    ->label('Ordem')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Mostrar no destaque da carteira')
                    ->default(false),
                Toggle::make('is_published')
                    ->label('Publicado')
                    ->default(true)
                    ->required(),
                FileUpload::make('logo')
                    ->label('Logótipo')
                    ->helperText('PNG, SVG ou JPG. Sem ficheiro, o portal mostra as iniciais da instituição.')
                    ->image()
                    ->imagePreviewHeight('140')
                    ->acceptedFileTypes([
                        'image/png',
                        'image/jpeg',
                        'image/svg+xml',
                        'image/webp',
                    ])
                    ->disk('public')
                    ->directory('content/clients')
                    ->visibility('public')
                    ->columnSpanFull(),
                Repeater::make('locations')
                    ->label('Localidades')
                    ->relationship()
                    ->schema([
                        Select::make('province')
                            ->label('Província')
                            ->options(array_combine(ClientLocation::PROVINCES, ClientLocation::PROVINCES))
                            ->searchable()
                            ->required()
                            ->live(),
                        Textarea::make('places')
                            ->label('Pontos operacionais')
                            ->helperText('Separe as localidades por vírgula. Ex.: Talatona, Kilamba, Cacuaco')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->itemLabel(fn (array $state): ?string => $state['province'] ?? null)
                    ->addActionLabel('Adicionar província')
                    ->collapsible()
                    ->defaultItems(1)
                    ->columnSpanFull()
                    ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                        $data['province_sort'] = ClientLocation::provinceSort((string) ($data['province'] ?? ''));

                        return $data;
                    })
                    ->mutateRelationshipDataBeforeSaveUsing(function (array $data): array {
                        $data['province_sort'] = ClientLocation::provinceSort((string) ($data['province'] ?? ''));

                        return $data;
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('logo')
                    ->label('Logótipo')
                    ->disk('public')
                    ->square(),
                TextColumn::make('name')
                    ->label('Instituição')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('sector')
                    ->label('Setor')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'banca' => 'Banca',
                        'retalho' => 'Retalho',
                        'industria' => 'Indústria e saúde',
                        default => $state,
                    })
                    ->badge(),
                IconColumn::make('is_featured')
                    ->label('Destaque')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Publicado')
                    ->boolean(),
                TextColumn::make('locations_count')
                    ->label('Províncias')
                    ->counts('locations')
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->label('Ordem')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
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
            'index' => ListClients::route('/'),
            'create' => CreateClient::route('/create'),
            'edit' => EditClient::route('/{record}/edit'),
        ];
    }
}
