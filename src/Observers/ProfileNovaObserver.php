<?php

namespace Laraning\NovaSurveyor\Observers;

use Laraning\Surveyor\Models\Profile;

class ProfileNovaObserver
{
    public function saving(Profile $model)
    {
    }

    public function created(Profile $model)
    {
        //
    }

    public function updated(Profile $model)
    {
        //
    }

    public function deleted(Profile $model)
    {
        //
    }

    public function forceDeleted(Profile $model)
    {
        //
    }
}
