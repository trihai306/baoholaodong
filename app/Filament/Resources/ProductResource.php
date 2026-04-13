<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cube';
    protected static string|\UnitEnum|null $navigationGroup = 'Sản phẩm';
    protected static ?string $navigationLabel = 'Sản phẩm';
    protected static ?string $modelLabel = 'Sản phẩm';
    protected static ?string $pluralModelLabel = 'Sản phẩm';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Thông tin cơ bản')->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Tên sản phẩm')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state) . '-' . Str::random(5))),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\Select::make('category_id')
                        ->label('Danh mục')
                        ->relationship('category', 'name')
                        ->required()
                        ->searchable()
                        ->preload(),
                    Forms\Components\TextInput::make('sku')
                        ->label('Mã SKU')
                        ->unique(ignoreRecord: true),
                ])->columns(2),

                Forms\Components\Section::make('Mô tả')->schema([
                    Forms\Components\Textarea::make('short_description')
                        ->label('Mô tả ngắn')
                        ->rows(2),
                    Forms\Components\RichEditor::make('description')
                        ->label('Mô tả chi tiết')
                        ->columnSpanFull(),
                ]),

                Forms\Components\Section::make('Thông số kỹ thuật')->schema([
                    Forms\Components\TextInput::make('brand')->label('Thương hiệu'),
                    Forms\Components\TextInput::make('origin')->label('Xuất xứ'),
                    Forms\Components\TextInput::make('material')->label('Chất liệu'),
                    Forms\Components\TextInput::make('certification')->label('Chứng nhận'),
                ])->columns(2),
            ])->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Giá & Kho')->schema([
                    Forms\Components\TextInput::make('price')
                        ->label('Giá (VNĐ)')
                        ->required()
                        ->numeric()
                        ->prefix('₫'),
                    Forms\Components\TextInput::make('sale_price')
                        ->label('Giá khuyến mãi')
                        ->numeric()
                        ->prefix('₫'),
                    Forms\Components\TextInput::make('stock')
                        ->label('Tồn kho')
                        ->numeric()
                        ->default(0),
                ]),

                Forms\Components\Section::make('Hình ảnh')->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Ảnh đại diện')
                        ->image()
                        ->directory('products')
                        ->imageEditor(),
                ]),

                Forms\Components\Section::make('Trạng thái')->schema([
                    Forms\Components\Toggle::make('is_active')
                        ->label('Hiển thị')
                        ->default(true),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Sản phẩm nổi bật'),
                ]),
            ])->columnSpan(['lg' => 1]),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Ảnh')->square()->size(50),
                Tables\Columns\TextColumn::make('name')->label('Tên sản phẩm')->searchable()->sortable()->limit(40),
                Tables\Columns\TextColumn::make('category.name')->label('Danh mục')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Giá')->money('VND', locale: 'vi')->sortable(),
                Tables\Columns\TextColumn::make('sale_price')->label('Giá KM')->money('VND', locale: 'vi')->placeholder('-'),
                Tables\Columns\TextColumn::make('stock')->label('Kho')->sortable(),
                Tables\Columns\ToggleColumn::make('is_featured')->label('Nổi bật'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Hiện'),
                Tables\Columns\TextColumn::make('created_at')->label('Ngày tạo')->dateTime('d/m/Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->label('Danh mục'),
                Tables\Filters\TernaryFilter::make('is_featured')->label('Nổi bật'),
                Tables\Filters\TernaryFilter::make('is_active')->label('Hiển thị'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
