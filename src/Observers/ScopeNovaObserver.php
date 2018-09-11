<?php

namespace Laraning\NovaSurveyor\Observers;

use Laraning\Surveyor\Models\Scope;

class ScopeNovaObserver
{
    public function saving(Scope $model)
    {
        info('Policy observer triggering saving inside Nova.');
    }

    public function created(Scope $model)
    {
        //
    }

    public function updated(Scope $model)
    {
        //
    }

    public function deleted(Scope $model)
    {
        //
    }

    public function forceDeleted(Scope $model)
    {
        //
    }
}
