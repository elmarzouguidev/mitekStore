<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NewProducts;
use Laravel\Nova\Dashboard;

class ProductInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(): array
    {
        return [
            
        ];
    }

    /**
     * Get the URI key for the dashboard.
     */
    public function uriKey(): string
    {
        return 'product-insights';
    }
}
