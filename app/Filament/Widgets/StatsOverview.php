<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Product;
use App\Models\Post;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Sản phẩm', Product::count())
                ->description('Tổng số sản phẩm')
                ->descriptionIcon('heroicon-m-cube')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5]),

            Stat::make('Danh mục', Category::count())
                ->description('Nhóm sản phẩm')
                ->descriptionIcon('heroicon-m-folder')
                ->color('info'),

            Stat::make('Bài viết', Post::count())
                ->description(Post::where('is_published', true)->count() . ' đã xuất bản')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),

            Stat::make('Liên hệ mới', Contact::where('is_read', false)->count())
                ->description('Chưa đọc')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
