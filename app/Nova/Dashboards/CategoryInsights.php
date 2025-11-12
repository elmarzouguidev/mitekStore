<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;

class CategoryInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(): array
    {
        return [
            //
        ];
    }

    /**
     * Get the URI key for the dashboard.
     */
    public function uriKey(): string
    {
        return 'category-insights';
    }
}
