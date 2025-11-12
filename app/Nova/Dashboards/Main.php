<?php

namespace App\Nova\Dashboards;

use App\Nova\Dashboards\Catalog\CategoryInsights;
use App\Nova\Metrics\NewProducts;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(): array
    {
        return [
            //new Help,
            NewProducts::make(),
        ];
    }
}
