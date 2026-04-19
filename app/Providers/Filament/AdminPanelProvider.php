<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Support\HtmlString;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Lộc Thịnh Admin')
            ->colors([
                'primary' => Color::Orange,
                'danger' => Color::Red,
                'info' => Color::Blue,
                'success' => Color::Green,
                'warning' => Color::Amber,
            ])
            ->navigationGroups([
                'Sản phẩm',
                'Nội dung',
                'Hệ thống',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook('panels::styles.after', fn () => new HtmlString('
                <style>
                    .sr-only {
                        position: absolute !important;
                        width: 1px !important;
                        height: 1px !important;
                        padding: 0 !important;
                        margin: -1px !important;
                        overflow: hidden !important;
                        clip: rect(0,0,0,0) !important;
                        white-space: nowrap !important;
                        border-width: 0 !important;
                    }
                    .tiptap-toolbar {
                        display: flex !important;
                        flex-direction: row !important;
                        flex-wrap: wrap !important;
                        align-items: center !important;
                        background: #f9fafb !important;
                        border-bottom: 1px solid #e5e7eb !important;
                        border-radius: 0.375rem 0.375rem 0 0 !important;
                        padding: 0.375rem !important;
                        gap: 0.125rem !important;
                    }
                    .tiptap-toolbar-left {
                        display: flex !important;
                        flex-direction: row !important;
                        flex-wrap: wrap !important;
                        align-items: center !important;
                        gap: 1px !important;
                        border: none !important;
                        padding: 0 !important;
                    }
                    .tiptap-toolbar .tiptap-tool {
                        padding: 0.3rem !important;
                        display: inline-flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        border-radius: 0.25rem !important;
                        cursor: pointer !important;
                    }
                    .tiptap-toolbar .tiptap-tool:hover {
                        background: rgba(0,0,0,0.08) !important;
                    }
                    .tiptap-toolbar .tiptap-tool svg {
                        width: 1rem !important;
                        height: 1rem !important;
                        display: block !important;
                    }
                    .tiptap-toolbar-left > div.h-5 {
                        display: inline-flex !important;
                        width: 1px !important;
                        height: 1rem !important;
                        background: #d1d5db !important;
                        margin: 0 0.25rem !important;
                        border: none !important;
                        align-self: center !important;
                    }
                    .tiptap-toolbar-right {
                        display: flex !important;
                        flex-direction: row !important;
                        align-items: center !important;
                        gap: 1px !important;
                        border: none !important;
                        padding: 0 0 0 0.25rem !important;
                    }
                    .tiptap-editor .ProseMirror {
                        min-height: 200px;
                        padding: 1rem;
                    }
                    .tippy-box { z-index: 99 !important; }
                </style>
            '));
    }
}
