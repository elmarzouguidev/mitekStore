<?php

namespace App\Providers;

use App\Models\User;
use App\Nova\Catalog\Category;
use App\Nova\Catalog\Product;
use App\Nova\Dashboards\Catalog\CategoryInsights;
use App\Nova\Dashboards\Main;
use App\Nova\Dashboards\ProductInsights;
use App\Nova\User as NovaUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Fortify\Features;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        $this->defineNovaLocale();
        $this->defineNovaFooter();
        $this->defineMenus();

        //
    }

    /**
     * Register the configurations for Laravel Fortify.
     */
    protected function fortify(): void
    {
        Nova::fortify()
            ->features([
                Features::updatePasswords(),
                // Features::emailVerification(),
                // Features::twoFactorAuthentication(['confirm' => true, 'confirmPassword' => true]),
            ])
            ->register();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes(default: true)
            ->withPasswordResetRoutes()
            ->withoutEmailVerificationRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewNova', function (User $user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Dashboard>
     */
    protected function dashboards(): array
    {
        return [
            new \App\Nova\Dashboards\Main,
            //new ProductInsights
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array<int, \Laravel\Nova\Tool>
     */
    public function tools(): array
    {
        return [];
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        //
    }

    private function defineMenus(): void
    {
        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::dashboard(Main::class)->icon('home'),

                MenuSection::make('Catalog', [
                    MenuItem::resource(Category::class),
                    MenuItem::resource(Product::class),
                ])->icon('shopping-bag')->collapsable(),

                MenuSection::make('Customers', [
                    MenuItem::resource(NovaUser::class),
                ])->icon('user')->collapsable(),
            ];
        });
    }

    private function defineNovaLocale(): void
    {
        Nova::userLocale(function () {
            return match (app()->getLocale()) {
                'en' => 'en-US',
                'fr' => 'fr_FR',
                default => null,
            };
        });
    }

    public function defineNovaFooter(): void
    {
        Nova::footer(function (Request $request) {
            return Blade::render('
            <p class="text-center">Powered by <a class="link-default" href="https://wedoapp.ma" target="__blank">WEDOAPP</a> · v{!! $version !!}</p>
            <p class="text-center">&copy; {!! $year !!} MitekStore.</p>
        ', [
                'version' => "5.7",
                'year' => date('Y'),
            ]);
        });
    }
}
