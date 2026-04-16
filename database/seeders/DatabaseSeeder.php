<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        $admin = User::create([
            'name' => 'Đỗ Quang Thịnh',
            'email' => 'thinhvtth.locthinh@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Categories
        $categories = [
            ['name' => 'Mũ bảo hộ', 'slug' => 'mu-bao-ho', 'sort_order' => 1],
            ['name' => 'Kính bảo hộ', 'slug' => 'kinh-bao-ho', 'sort_order' => 2],
            ['name' => 'Găng tay bảo hộ', 'slug' => 'gang-tay-bao-ho', 'sort_order' => 3],
            ['name' => 'Giày bảo hộ', 'slug' => 'giay-bao-ho', 'sort_order' => 4],
            ['name' => 'Quần áo bảo hộ', 'slug' => 'quan-ao-bao-ho', 'sort_order' => 5],
            ['name' => 'Khẩu trang', 'slug' => 'khau-trang', 'sort_order' => 6],
            ['name' => 'Dây đai an toàn', 'slug' => 'day-dai-an-toan', 'sort_order' => 7],
            ['name' => 'Thiết bị PCCC', 'slug' => 'thiet-bi-pccc', 'sort_order' => 8],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Products
        $products = [
            ['category_id' => 1, 'name' => 'Mũ bảo hộ Proguard HC-31', 'price' => 85000, 'brand' => 'Proguard', 'origin' => 'Malaysia', 'material' => 'Nhựa PE', 'certification' => 'EN 397', 'stock' => 100, 'is_featured' => true, 'short_description' => 'Mũ bảo hộ công trình chất lượng cao, chống va đập tốt.'],
            ['category_id' => 1, 'name' => 'Mũ bảo hộ 3M H-701R', 'price' => 250000, 'brand' => '3M', 'origin' => 'Mỹ', 'material' => 'Nhựa HDPE', 'certification' => 'ANSI Z89.1', 'stock' => 50, 'is_featured' => true, 'short_description' => 'Mũ bảo hộ cao cấp 3M, tiêu chuẩn Mỹ.'],
            ['category_id' => 2, 'name' => 'Kính bảo hộ Uvex 9301', 'price' => 180000, 'brand' => 'Uvex', 'origin' => 'Đức', 'material' => 'Polycarbonate', 'certification' => 'EN 166', 'stock' => 80, 'is_featured' => true, 'short_description' => 'Kính bảo hộ chống bụi, chống tia UV.'],
            ['category_id' => 2, 'name' => 'Kính bảo hộ Honeywell A800', 'price' => 120000, 'brand' => 'Honeywell', 'origin' => 'Mỹ', 'material' => 'Polycarbonate', 'certification' => 'ANSI Z87.1', 'stock' => 120, 'short_description' => 'Kính bảo hộ thời trang, trọng lượng nhẹ.'],
            ['category_id' => 3, 'name' => 'Găng tay chống cắt Ansell HyFlex', 'price' => 95000, 'brand' => 'Ansell', 'origin' => 'Úc', 'material' => 'Nylon/Spandex', 'certification' => 'EN 388', 'stock' => 200, 'is_featured' => true, 'short_description' => 'Găng tay chống cắt Level 5, linh hoạt cao.'],
            ['category_id' => 3, 'name' => 'Găng tay cao su công nghiệp', 'price' => 35000, 'brand' => 'Nam Long', 'origin' => 'Việt Nam', 'material' => 'Cao su tự nhiên', 'stock' => 500, 'short_description' => 'Găng tay cao su dày, chống hóa chất.'],
            ['category_id' => 4, 'name' => 'Giày bảo hộ Safety Jogger Bestrun', 'price' => 450000, 'sale_price' => 380000, 'brand' => 'Safety Jogger', 'origin' => 'Bỉ', 'material' => 'Da bò / Mũi thép', 'certification' => 'EN ISO 20345 S3', 'stock' => 60, 'is_featured' => true, 'short_description' => 'Giày bảo hộ cao cấp, chống đinh, chống trượt.'],
            ['category_id' => 4, 'name' => 'Giày bảo hộ Takumi TSH-115', 'price' => 320000, 'brand' => 'Takumi', 'origin' => 'Nhật Bản', 'material' => 'Vải canvas / Mũi composite', 'stock' => 80, 'short_description' => 'Giày bảo hộ siêu nhẹ kiểu Nhật.'],
            ['category_id' => 5, 'name' => 'Bộ quần áo bảo hộ Pangrim', 'price' => 280000, 'brand' => 'Pangrim', 'origin' => 'Hàn Quốc', 'material' => 'Vải Kaki', 'stock' => 150, 'is_featured' => true, 'short_description' => 'Quần áo bảo hộ vải kaki dày, bền đẹp.'],
            ['category_id' => 5, 'name' => 'Áo phản quang 3 sọc', 'price' => 65000, 'brand' => 'An Toàn', 'origin' => 'Việt Nam', 'material' => 'Vải lưới / Sọc phản quang', 'stock' => 300, 'short_description' => 'Áo phản quang cho công nhân giao thông.'],
            ['category_id' => 6, 'name' => 'Khẩu trang 3M 8210 N95', 'price' => 45000, 'brand' => '3M', 'origin' => 'Mỹ', 'certification' => 'NIOSH N95', 'stock' => 1000, 'is_featured' => true, 'short_description' => 'Khẩu trang chống bụi mịn N95 chính hãng 3M.'],
            ['category_id' => 6, 'name' => 'Mặt nạ phòng độc 3M 6800', 'price' => 850000, 'brand' => '3M', 'origin' => 'Mỹ', 'material' => 'Silicone', 'certification' => 'EN 136', 'stock' => 30, 'short_description' => 'Mặt nạ phòng độc toàn mặt.'],
            ['category_id' => 7, 'name' => 'Dây đai an toàn toàn thân Honeywell', 'price' => 1200000, 'sale_price' => 980000, 'brand' => 'Honeywell', 'origin' => 'Mỹ', 'certification' => 'EN 361', 'stock' => 25, 'is_featured' => true, 'short_description' => 'Dây đai an toàn làm việc trên cao.'],
            ['category_id' => 8, 'name' => 'Bình chữa cháy bột ABC 4kg', 'price' => 350000, 'brand' => 'Yamato', 'origin' => 'Nhật Bản', 'certification' => 'TCVN 7026:2013', 'stock' => 40, 'short_description' => 'Bình chữa cháy bột đa năng ABC.'],
            ['category_id' => 8, 'name' => 'Bình chữa cháy CO2 5kg', 'price' => 750000, 'brand' => 'Dragon', 'origin' => 'Việt Nam', 'certification' => 'TCVN 7026:2013', 'stock' => 20, 'short_description' => 'Bình chữa cháy khí CO2 cho thiết bị điện.'],
        ];

        foreach ($products as $p) {
            $p['slug'] = Str::slug($p['name']) . '-' . Str::random(5);
            $p['is_active'] = true;
            $p['is_featured'] = $p['is_featured'] ?? false;
            Product::create($p);
        }

        // Posts
        $posts = [
            [
                'title' => 'Hướng dẫn chọn mũ bảo hộ lao động đúng chuẩn',
                'excerpt' => 'Mũ bảo hộ lao động là trang bị không thể thiếu tại các công trình xây dựng.',
                'content' => '<h3>1. Tại sao cần đội mũ bảo hộ?</h3><p>Mũ bảo hộ lao động giúp bảo vệ đầu khỏi các vật rơi, va đập trong quá trình làm việc tại công trường, nhà máy.</p><h3>2. Các loại mũ bảo hộ phổ biến</h3><p>Có nhiều loại mũ bảo hộ: mũ nhựa HDPE, mũ sợi thủy tinh, mũ có kính che mặt...</p><h3>3. Tiêu chuẩn cần đáp ứng</h3><p>Mũ bảo hộ cần đạt tiêu chuẩn EN 397 (Châu Âu) hoặc ANSI Z89.1 (Mỹ).</p>',
                'type' => 'blog',
                'is_published' => true,
            ],
            [
                'title' => 'Top 5 loại giày bảo hộ tốt nhất năm 2024',
                'excerpt' => 'Tổng hợp các mẫu giày bảo hộ được ưa chuộng nhất hiện nay.',
                'content' => '<h3>1. Safety Jogger Bestrun</h3><p>Giày bảo hộ đến từ Bỉ, nổi tiếng với độ bền và khả năng chống trượt tuyệt vời.</p><h3>2. Takumi TSH-115</h3><p>Giày siêu nhẹ kiểu Nhật, phù hợp cho công việc cần di chuyển nhiều.</p><h3>3. Kingsman Explorer</h3><p>Thiết kế thể thao, phù hợp với nhiều môi trường làm việc.</p>',
                'type' => 'blog',
                'is_published' => true,
            ],
            [
                'title' => 'Quy định mới về an toàn lao động năm 2024',
                'excerpt' => 'Bộ Lao động ban hành các quy định mới về trang bị bảo hộ lao động.',
                'content' => '<p>Theo Nghị định mới, người sử dụng lao động phải đảm bảo cung cấp đầy đủ phương tiện bảo vệ cá nhân cho người lao động khi làm việc trong môi trường có yếu tố nguy hiểm, độc hại.</p><p>Các yêu cầu bao gồm: mũ bảo hộ, kính bảo hộ, găng tay, giày bảo hộ, quần áo bảo hộ phù hợp với từng vị trí công việc.</p>',
                'type' => 'news',
                'is_published' => true,
            ],
            [
                'title' => 'Cách bảo quản đồ bảo hộ lao động đúng cách',
                'excerpt' => 'Hướng dẫn cách vệ sinh và bảo quản các trang thiết bị bảo hộ.',
                'content' => '<h3>1. Vệ sinh sau mỗi ca làm việc</h3><p>Lau sạch bụi bẩn, mồ hôi trên các thiết bị bảo hộ.</p><h3>2. Bảo quản nơi khô ráo</h3><p>Tránh để ở nơi ẩm ướt, có ánh nắng trực tiếp.</p><h3>3. Kiểm tra định kỳ</h3><p>Thường xuyên kiểm tra và thay thế khi phát hiện hư hỏng.</p>',
                'type' => 'blog',
                'is_published' => true,
            ],
        ];

        foreach ($posts as $p) {
            $p['slug'] = Str::slug($p['title']) . '-' . Str::random(5);
            $p['user_id'] = $admin->id;
            Post::create($p);
        }

        // Settings
        $settings = [
            'company_name'             => 'Công ty TNHH Vật Tư Tổng Hợp Lộc Thịnh',
            'company_short_name'       => 'Lộc Thịnh',
            'company_slogan'           => 'Vật Tư Bảo Hộ Lao Động Chất Lượng Cao',
            'tax_code'                 => '2301394954',
            'director_name'            => 'Đỗ Quang Thịnh',
            'phone_primary'            => '0964186111',
            'phone_primary_display'    => '0964.186.111',
            'phone_secondary'          => '0972998444',
            'phone_secondary_display'  => '0972.998.444',
            'email'                    => 'thinhvtth.locthinh@gmail.com',
            'address_hq'               => 'Tổ dân phố Bình Cầu, Phường Mão Điền, Tỉnh Bắc Ninh',
            'address_office'           => '074 LK KĐT HUD Trầu Cau, P. Võ Cường, Bắc Ninh',
            'address_city'             => 'Bắc Ninh',
            'website'                  => 'www.locthinh.com',
            'working_hours'            => 'T2 - T7: 8:00 - 17:30',
            'facebook_url'             => '#',
            'youtube_url'              => '#',
            'tiktok_url'               => '#',
            'instagram_url'            => '#',
            'zalo_phone'               => '0964186111',
            'facebook_messenger'       => 'locthinh.vn',
            'logo'                     => null,
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
