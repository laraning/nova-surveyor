<?php

namespace Laraning\NovaSurveyor;

use Laraning\NovaSurveyor\Resources\Policy;
use Laraning\NovaSurveyor\Resources\Profile;
use Laraning\NovaSurveyor\Resources\Scope;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class NovaSurveyor extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::resources([
            Profile::class,
            Scope::class,
            Policy::class,
        ]);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-surveyor::navigation');
    }
}
