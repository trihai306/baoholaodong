<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';
    protected static string|\UnitEnum|null $navigationGroup = 'Nội dung';
    protected static ?string $navigationLabel = 'Bài viết';
    protected static ?string $modelLabel = 'Bài viết';
    protected static ?string $pluralModelLabel = 'Bài viết';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Nội dung bài viết')->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Tiêu đề')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Forms\Set $set, ?string $state) => $set('slug', Str::slug($state) . '-' . Str::random(5))),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\Textarea::make('excerpt')
                        ->label('Tóm tắt')
                        ->rows(2),
                    Forms\Components\RichEditor::make('content')
                        ->label('Nội dung')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
            ])->columnSpan(['lg' => 2]),

            Forms\Components\Group::make()->schema([
                Forms\Components\Section::make('Thiết lập')->schema([
                    Forms\Components\Select::make('type')
                        ->label('Loại')
                        ->options([
                            'blog' => 'Blog',
                            'news' => 'Tin tức',
                            'page' => 'Trang tĩnh',
                        ])
                        ->default('blog')
                        ->required(),
                    Forms\Components\Toggle::make('is_published')
                        ->label('Xuất bản')
                        ->default(false),
                    Forms\Components\Hidden::make('user_id')
                        ->default(auth()->id()),
                ]),
                Forms\Components\Section::make('Hình ảnh')->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('Ảnh bìa')
                        ->image()
                        ->directory('posts')
                        ->imageEditor(),
                ]),
            ])->columnSpan(['lg' => 1]),
        ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Ảnh')->square()->size(50),
                Tables\Columns\TextColumn::make('title')->label('Tiêu đề')->searchable()->sortable()->limit(50),
                Tables\Columns\BadgeColumn::make('type')->label('Loại')
                    ->colors(['primary' => 'blog', 'info' => 'news', 'warning' => 'page']),
                Tables\Columns\TextColumn::make('user.name')->label('Tác giả'),
                Tables\Columns\IconColumn::make('is_published')->label('Đã đăng')->boolean(),
                Tables\Columns\TextColumn::make('view_count')->label('Lượt xem')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Ngày tạo')->dateTime('d/m/Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('type')
                    ->label('Loại')
                    ->options(['blog' => 'Blog', 'news' => 'Tin tức', 'page' => 'Trang tĩnh']),
                Tables\Filters\TernaryFilter::make('is_published')->label('Đã đăng'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
