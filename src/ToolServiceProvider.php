<?php

namespace Laraning\NovaSurveyor;

use Laravel\Nova\Nova;
use Laraning\Surveyor\Models\Scope;
use Laraning\Surveyor\Models\Policy;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Laraning\Surveyor\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Laraning\NovaSurveyor\Http\Middleware\Authorize;
use Laraning\NovaSurveyor\Observers\ScopeNovaObserver;
use Laraning\NovaSurveyor\Observers\ProfileNovaObserver;
use Laraning\NovaSurveyor\Observers\PolicyNovaObserver;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-surveyor');

        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Profile::observe(ProfileNovaObserver::class);
            Scope::observe(ScopeNovaObserver::class);
            Policy::observe(PolicyNovaObserver::class);
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/nova-surveyor')
                ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
