<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-folder';
    protected static string|\UnitEnum|null $navigationGroup = 'Sản phẩm';
    protected static ?string $navigationLabel = 'Danh mục';
    protected static ?string $modelLabel = 'Danh mục';
    protected static ?string $pluralModelLabel = 'Danh mục';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Schemas\Components\Section::make('Thông tin danh mục')->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Tên danh mục')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Schemas\Components\Utilities\Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('parent_id')
                    ->label('Danh mục cha')
                    ->relationship('parent', 'name', fn ($query, $record) =>
                        $query->whereNull('parent_id')
                            ->when($record, fn ($q) => $q->where('id', '!=', $record->id))
                    )
                    ->searchable()
                    ->preload()
                    ->placeholder('-- Không có (là danh mục gốc) --'),
                Forms\Components\Textarea::make('description')
                    ->label('Mô tả')
                    ->rows(3),
                Forms\Components\FileUpload::make('image')
                    ->label('Hình ảnh')
                    ->image()
                    ->disk('public')
                    ->directory('categories'),
                Forms\Components\TextInput::make('sort_order')
                    ->label('Thứ tự')
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Hiển thị')
                    ->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Ảnh')->disk('public')->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên')
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->parent_id) {
                            return '↳ ' . $state;
                        }
                        return $state;
                    })
                    ->weight(fn ($record) => $record->parent_id ? null : 'bold')
                    ->color(fn ($record) => $record->parent_id ? 'gray' : null),
                Tables\Columns\TextColumn::make('parent.name')->label('Danh mục cha')->placeholder('— Danh mục gốc —'),
                Tables\Columns\TextColumn::make('children_count')->counts('children')->label('Danh mục con'),
                Tables\Columns\TextColumn::make('products_count')->counts('products')->label('Sản phẩm'),
                Tables\Columns\TextColumn::make('sort_order')->label('Thứ tự')->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Hiển thị'),
            ])
            ->defaultSort('sort_order')
            ->modifyQueryUsing(function ($query) {
                return $query
                    ->orderByRaw('COALESCE(parent_id, id), parent_id IS NOT NULL, sort_order');
            })
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')->label('Hiển thị'),
                Tables\Filters\SelectFilter::make('parent_id')
                    ->label('Danh mục cha')
                    ->relationship('parent', 'name')
                    ->placeholder('Tất cả')
                    ->preload(),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
