<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas;
use Filament\Schemas\Schema;

class ManageSettings extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string|\UnitEnum|null $navigationGroup = 'Hệ thống';
    protected static ?string $navigationLabel = 'Cài đặt chung';
    protected static ?string $title = 'Cài đặt chung';
    protected static ?int $navigationSort = 10;
    protected static string $view = 'filament.pages.manage-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(Setting::allCached());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Schemas\Components\Section::make('Thông tin công ty')
                    ->icon('heroicon-o-building-office')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('company_name')
                            ->label('Tên công ty (đầy đủ)')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('company_short_name')
                            ->label('Tên ngắn')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('company_slogan')
                            ->label('Slogan')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tax_code')
                            ->label('Mã số thuế (MST)')
                            ->maxLength(20),
                        Forms\Components\TextInput::make('director_name')
                            ->label('Giám đốc')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->maxLength(100),
                        Forms\Components\TextInput::make('working_hours')
                            ->label('Giờ làm việc')
                            ->maxLength(100)
                            ->placeholder('T2 - T7: 8:00 - 17:30'),
                    ]),

                Schemas\Components\Section::make('Liên hệ')
                    ->icon('heroicon-o-phone')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('phone_primary')
                            ->label('Hotline chính (số)')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('0964186111'),
                        Forms\Components\TextInput::make('phone_primary_display')
                            ->label('Hotline chính (hiển thị)')
                            ->maxLength(20)
                            ->placeholder('0964.186.111'),
                        Forms\Components\TextInput::make('phone_secondary')
                            ->label('Hotline phụ (số)')
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('phone_secondary_display')
                            ->label('Hotline phụ (hiển thị)')
                            ->maxLength(20)
                            ->placeholder('0972.998.444'),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address_city')
                            ->label('Tỉnh / Thành phố')
                            ->maxLength(100),
                        Forms\Components\Textarea::make('address_hq')
                            ->label('Địa chỉ trụ sở chính')
                            ->rows(2)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('address_office')
                            ->label('Địa chỉ văn phòng')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Schemas\Components\Section::make('Mạng xã hội')
                    ->icon('heroicon-o-share')
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->label('Facebook URL')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tiktok_url')
                            ->label('TikTok URL')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('zalo_phone')
                            ->label('Zalo (số điện thoại)')
                            ->tel()
                            ->maxLength(20),
                        Forms\Components\TextInput::make('facebook_messenger')
                            ->label('Facebook Messenger ID')
                            ->maxLength(100)
                            ->placeholder('locthinh.vn'),
                    ]),

                Schemas\Components\Section::make('Logo')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo công ty')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->helperText('Để trống nếu muốn giữ logo mặc định'),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        Setting::setMany($data);

        Notification::make()
            ->title('Đã lưu cài đặt thành công')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Lưu cài đặt')
                ->action('save')
                ->icon('heroicon-o-check')
                ->color('primary'),
        ];
    }
}
