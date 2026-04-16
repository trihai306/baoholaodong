<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingComposer
{
    public function compose(View $view): void
    {
        $view->with('setting', Setting::allCached());
    }
}
