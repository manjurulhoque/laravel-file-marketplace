<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AccountStatsComposer
{
    public function compose(View $view)
    {
        $user = auth()->user();

        $sales = $user->sales;
        $files = $user->files()->finished();


        $view->with([
            'fileCount' => $files->count(),
            'saleCount' => $sales->count(),
            'thisMonthEarned' => $user->saleValueThisMonth(),
            'lifetimeEarned' => $user->saleValueOverLifetime()
        ]);
    }
}