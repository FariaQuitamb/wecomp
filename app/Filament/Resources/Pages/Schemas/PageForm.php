<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome no CMS')
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('slug')
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('title')
                    ->label('Título da página')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('meta_description')
                    ->label('Descrição para pesquisa')
                    ->rows(2)
                    ->columnSpanFull(),

                ...self::layoutFields(),
                ...self::homeFields(),
                ...self::aboutFields(),
                ...self::resultsFields(),
                ...self::contactFields(),
                ...self::solutionsFields(),
                ...self::sectorsFields(),
                ...self::legalFields(),
            ]);
    }

    /**
     * @return array<int, mixed>
     */
    private static function layoutFields(): array
    {
        return [
            Section::make('Chamada e rodapé')
                ->visible(fn (Get $get): bool => $get('slug') === 'layout')
                ->schema([
                    TextInput::make('data.header_cta')->label('Botão do menu'),
                    TextInput::make('data.cta_title')->label('Título da chamada')->columnSpanFull(),
                    Textarea::make('data.cta_text')->label('Texto da chamada')->columnSpanFull(),
                    TextInput::make('data.cta_button')->label('Botão da chamada'),
                    Textarea::make('data.footer_text')->label('Texto do rodapé')->columnSpanFull(),
                    TextInput::make('data.footer_legal')->label('Referências legais')->columnSpanFull(),
                    TextInput::make('data.copyright')->label('Copyright')->columnSpanFull(),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function homeFields(): array
    {
        return [
            Section::make('Início')
                ->visible(fn (Get $get): bool => $get('slug') === 'home')
                ->schema([
                    FileUpload::make('data.hero_image')->label('Imagem principal')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    Textarea::make('data.hero_title')->label('Título principal')->rows(2)->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto principal')->columnSpanFull(),
                    TextInput::make('data.primary_cta')->label('Botão principal'),
                    TextInput::make('data.secondary_cta')->label('Botão secundário'),
                    self::statRepeater('data.stats', 'Indicadores'),
                    TextInput::make('data.problem_kicker')->label('Antetítulo do problema'),
                    Textarea::make('data.problem_title')->label('Título do problema')->columnSpanFull(),
                    Textarea::make('data.problem_text')->label('Texto do problema')->columnSpanFull(),
                    self::cardRepeater('data.risks', 'Riscos', withNumber: true),
                    TextInput::make('data.solutions_kicker')->label('Antetítulo das soluções'),
                    Textarea::make('data.solutions_title')->label('Título das soluções')->columnSpanFull(),
                    Textarea::make('data.solutions_text')->label('Texto das soluções')->columnSpanFull(),
                    TextInput::make('data.solutions_cta')->label('Ligação das soluções'),
                    TextInput::make('data.method_kicker')->label('Antetítulo da metodologia'),
                    Textarea::make('data.method_title')->label('Título da metodologia')->columnSpanFull(),
                    Textarea::make('data.method_text')->label('Texto da metodologia')->columnSpanFull(),
                    FileUpload::make('data.method_image')->label('Imagem da metodologia')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.method_caption')->label('Legenda da metodologia')->columnSpanFull(),
                    TextInput::make('data.method_cta')->label('Botão da metodologia'),
                    self::textRepeater('data.method_items', 'Passos da metodologia'),
                    TextInput::make('data.coverage_kicker')->label('Antetítulo da cobertura'),
                    Textarea::make('data.coverage_title')->label('Título da cobertura')->columnSpanFull(),
                    Textarea::make('data.coverage_text')->label('Texto da cobertura')->columnSpanFull(),
                    FileUpload::make('data.coverage_image')->label('Imagem da cobertura')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.coverage_cta')->label('Botão da cobertura'),
                    TextInput::make('data.about_kicker')->label('Antetítulo sobre nós'),
                    Textarea::make('data.about_title')->label('Título sobre nós')->columnSpanFull(),
                    Textarea::make('data.about_text')->label('Texto sobre nós')->columnSpanFull(),
                    FileUpload::make('data.about_image')->label('Imagem sobre nós')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.about_caption')->label('Legenda sobre nós')->columnSpanFull(),
                    self::cardRepeater('data.about_points', 'Pontos sobre nós'),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function aboutFields(): array
    {
        return [
            Section::make('Sobre nós')
                ->visible(fn (Get $get): bool => $get('slug') === 'about')
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    Textarea::make('data.hero_title')->label('Título')->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto de destaque')->columnSpanFull(),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.who_kicker')->label('Antetítulo quem somos'),
                    Textarea::make('data.who_title')->label('Título quem somos')->columnSpanFull(),
                    Textarea::make('data.who_text')->label('Primeiro parágrafo')->columnSpanFull(),
                    Textarea::make('data.who_text_2')->label('Segundo parágrafo')->columnSpanFull(),
                    FileUpload::make('data.who_image')->label('Imagem quem somos')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.who_caption')->label('Legenda')->columnSpanFull(),
                    self::cardRepeater('data.values', 'Missão, visão e valores'),
                    TextInput::make('data.process_kicker')->label('Antetítulo do processo'),
                    Textarea::make('data.process_title')->label('Título do processo')->columnSpanFull(),
                    Textarea::make('data.process_text')->label('Texto do processo')->columnSpanFull(),
                    self::cardRepeater('data.process_steps', 'Etapas', withNumber: true),
                    TextInput::make('data.team_kicker')->label('Antetítulo da equipa'),
                    Textarea::make('data.team_title')->label('Título da equipa')->columnSpanFull(),
                    Textarea::make('data.team_text')->label('Texto da equipa')->columnSpanFull(),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function resultsFields(): array
    {
        return [
            Section::make('Resultados')
                ->visible(fn (Get $get): bool => $get('slug') === 'results')
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    Textarea::make('data.hero_title')->label('Título')->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto de destaque')->columnSpanFull(),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    self::statRepeater('data.stats', 'Indicadores'),
                    TextInput::make('data.coverage_kicker')->label('Antetítulo da cobertura'),
                    Textarea::make('data.coverage_title')->label('Título da cobertura')->columnSpanFull(),
                    Textarea::make('data.coverage_text')->label('Texto da cobertura')->columnSpanFull(),
                    Repeater::make('data.locations')
                        ->label('Localizações')
                        ->schema([
                            TextInput::make('place')->label('Local')->required(),
                            TextInput::make('sector')->label('Filtro')->helperText('banca, retalho ou industria')->required(),
                            TextInput::make('label')->label('Legenda')->required(),
                        ])
                        ->columns(3)
                        ->collapsible()
                        ->columnSpanFull(),
                    TextInput::make('data.cases_kicker')->label('Antetítulo dos casos'),
                    Textarea::make('data.cases_title')->label('Título dos casos')->columnSpanFull(),
                    Textarea::make('data.cases_text')->label('Texto dos casos')->columnSpanFull(),
                    TextInput::make('data.cases_notice_title')->label('Aviso, título')->columnSpanFull(),
                    Textarea::make('data.cases_notice_text')->label('Aviso, texto')->columnSpanFull(),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function contactFields(): array
    {
        return [
            Section::make('Contacto')
                ->visible(fn (Get $get): bool => $get('slug') === 'contact')
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    Textarea::make('data.hero_title')->label('Título')->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto de destaque')->columnSpanFull(),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.submit_label')->label('Texto do botão'),
                    Textarea::make('data.success_message')->label('Mensagem de sucesso')->columnSpanFull(),
                    TextInput::make('data.address_kicker')->label('Antetítulo da morada'),
                    Textarea::make('data.address')->label('Morada')->rows(3)->columnSpanFull(),
                    TextInput::make('data.next_kicker')->label('Antetítulo dos passos seguintes'),
                    self::textRepeater('data.next_steps', 'Passos seguintes'),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function solutionsFields(): array
    {
        return [
            Section::make('Página de soluções')
                ->visible(fn (Get $get): bool => $get('slug') === 'solutions')
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    Textarea::make('data.hero_title')->label('Título')->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto de destaque')->columnSpanFull(),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.hero_cta')->label('Botão do destaque'),
                    TextInput::make('data.list_kicker')->label('Antetítulo da lista'),
                    Textarea::make('data.list_title')->label('Título da lista')->columnSpanFull(),
                    Textarea::make('data.list_text')->label('Texto da lista')->columnSpanFull(),
                    TextInput::make('data.card_cta')->label('Ligação dos cartões'),
                    Textarea::make('data.empty_text')->label('Texto sem soluções')->columnSpanFull(),
                    TextInput::make('data.method_kicker')->label('Antetítulo da metodologia'),
                    Textarea::make('data.method_title')->label('Título da metodologia')->columnSpanFull(),
                    self::cardRepeater('data.method_steps', 'Fases da metodologia', withNumber: true),
                    TextInput::make('data.show_kicker')->label('Antetítulo do detalhe'),
                    TextInput::make('data.legal_kicker')->label('Antetítulo legal'),
                    TextInput::make('data.legal_fallback')->label('Texto legal de recurso'),
                    Textarea::make('data.legal_text')->label('Texto legal')->columnSpanFull(),
                    TextInput::make('data.process_kicker')->label('Antetítulo do processo'),
                    Textarea::make('data.process_title')->label('Título do processo')->columnSpanFull(),
                    self::cardRepeater('data.process_steps', 'Etapas do processo', withNumber: true),
                    TextInput::make('data.related_kicker')->label('Antetítulo dos setores'),
                    Textarea::make('data.related_title')->label('Título dos setores')->columnSpanFull(),
                    TextInput::make('data.related_cta')->label('Ligação dos setores'),
                    TextInput::make('data.cta_label')->label('Botão de avaliação'),
                    TextInput::make('data.details_cta')->label('Botão de detalhes'),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function sectorsFields(): array
    {
        return [
            Section::make('Página de setores')
                ->visible(fn (Get $get): bool => $get('slug') === 'sectors')
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    Textarea::make('data.hero_title')->label('Título')->columnSpanFull(),
                    Textarea::make('data.hero_text')->label('Texto de destaque')->columnSpanFull(),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    TextInput::make('data.list_kicker')->label('Antetítulo da lista'),
                    Textarea::make('data.list_title')->label('Título da lista')->columnSpanFull(),
                    Textarea::make('data.list_text')->label('Texto da lista')->columnSpanFull(),
                    TextInput::make('data.card_cta')->label('Ligação dos cartões'),
                    Textarea::make('data.empty_text')->label('Texto sem setores')->columnSpanFull(),
                    TextInput::make('data.close_kicker')->label('Antetítulo de fecho'),
                    Textarea::make('data.close_title')->label('Título de fecho')->columnSpanFull(),
                    Textarea::make('data.close_text')->label('Texto de fecho')->columnSpanFull(),
                    TextInput::make('data.show_kicker')->label('Antetítulo do detalhe'),
                    TextInput::make('data.show_cta')->label('Botão do detalhe'),
                    TextInput::make('data.context_kicker')->label('Antetítulo do contexto'),
                    TextInput::make('data.approach_kicker')->label('Antetítulo da abordagem'),
                    TextInput::make('data.approach_title')->label('Título da abordagem'),
                    Textarea::make('data.approach_text')->label('Texto da abordagem')->columnSpanFull(),
                    TextInput::make('data.related_kicker')->label('Antetítulo das soluções'),
                    Textarea::make('data.related_title')->label('Título das soluções')->columnSpanFull(),
                    TextInput::make('data.related_cta')->label('Ligação das soluções'),
                    TextInput::make('data.criteria_kicker')->label('Antetítulo dos critérios'),
                    Textarea::make('data.criteria_title')->label('Título dos critérios')->columnSpanFull(),
                    self::textRepeater('data.criteria', 'Critérios'),
                ]),
        ];
    }

    /**
     * @return array<int, mixed>
     */
    private static function legalFields(): array
    {
        return [
            Section::make('Texto legal')
                ->visible(fn (Get $get): bool => in_array($get('slug'), ['privacy', 'terms'], true))
                ->schema([
                    TextInput::make('data.hero_kicker')->label('Antetítulo'),
                    FileUpload::make('data.hero_image')->label('Imagem de destaque')->image()->disk('public')->directory('content/pages')->columnSpanFull(),
                    Textarea::make('data.notice')->label('Aviso')->columnSpanFull(),
                    RichEditor::make('data.body')->label('Conteúdo')->columnSpanFull(),
                ]),
        ];
    }

    private static function statRepeater(string $name, string $label): Repeater
    {
        return Repeater::make($name)
            ->label($label)
            ->schema([
                TextInput::make('number')->label('Valor')->required(),
                TextInput::make('label')->label('Legenda')->required(),
            ])
            ->columns(2)
            ->collapsible()
            ->columnSpanFull();
    }

    private static function textRepeater(string $name, string $label): Repeater
    {
        return Repeater::make($name)
            ->label($label)
            ->schema([
                TextInput::make('text')->label('Texto')->required(),
            ])
            ->collapsible()
            ->columnSpanFull();
    }

    private static function cardRepeater(string $name, string $label, bool $withNumber = false): Repeater
    {
        return Repeater::make($name)
            ->label($label)
            ->schema(array_values(array_filter([
                $withNumber ? TextInput::make('number')->label('Número') : null,
                TextInput::make('title')->label('Título')->required(),
                Textarea::make('text')->label('Texto')->required()->columnSpanFull(),
            ])))
            ->columns($withNumber ? 2 : 1)
            ->collapsible()
            ->columnSpanFull();
    }
}
