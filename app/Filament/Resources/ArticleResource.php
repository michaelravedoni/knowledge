<?php

namespace App\Filament\Resources;

use Closure;
use Builder\Block;
use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Pages\Page;
use App\Enums\ArticleStatus;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ArticleCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;

class ArticleResource extends Resource
{
    use Translatable;

    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->reactive()
                    ->afterStateUpdated(function (Page $livewire, Closure $set, ?string $state): void {
                        if ($livewire instanceof Pages\EditArticle) {
                            return;
                        }

                        $set('slug', str($state)->slug());
                    })
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled(fn (?Article $record) => (! auth()->user()->is_admin) && $record?->status === ArticleStatus::Published),
                Select::make('project_id')
                    ->relationship('project', 'name')
                    ->required(),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->required(),
                Select::make('status')
                    ->options(collect(ArticleStatus::cases())->mapWithKeys(fn (ArticleStatus $category): array => [$category->value => $category->getLabel()]))
                    // ->visible(auth()->user()->is_admin)
                    ->required(),
                Builder::make('content')
                    ->blocks([
                        Builder\Block::make('heading')
                            ->schema([
                                TextInput::make('content')
                                    ->label('Heading')
                                    ->required(),
                                Select::make('level')
                                    ->options([
                                        'h1' => 'Heading 1',
                                        'h2' => 'Heading 2',
                                        'h3' => 'Heading 3',
                                        'h4' => 'Heading 4',
                                        'h5' => 'Heading 5',
                                        'h6' => 'Heading 6',
                                    ])
                                    ->required(),
                            ]),
                        Builder\Block::make('paragraph')
                            ->schema([
                                MarkdownEditor::make('content')
                                    ->label('Paragraph')
                                    ->required(),
                            ]),
                        Builder\Block::make('image')
                            ->schema([
                                FileUpload::make('url')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                TextInput::make('alt')
                                    ->label('Alt text')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => ArticleStatus::Draft->value,
                        'success' => ArticleStatus::Published->value,
                    ])
                    ->enum(collect(ArticleStatus::cases())->mapWithKeys(fn (ArticleStatus $status): array => [$status->value => $status->getLabel()]))
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
