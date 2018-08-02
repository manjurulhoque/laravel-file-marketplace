<?php

namespace App\Http\ViewComposers;

use App\File;
use App\Sale;
use Illuminate\View\View;

class AdminStatsComposer
{
    public function compose(View $view)
    {
        $view->with([
            'fileCount' => File::finished()->approved()->count(),
            'saleCount' => Sale::count(),
            'thisMonthCommission' => Sale::commissionThisMonth(),
            'lifetimeCommission' => Sale::lifetimeCommission(),
        ]);
    }
}