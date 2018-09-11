<?php

namespace Laraning\NovaSurveyor\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laraning\Surveyor\Models\Profile;
use Laravel\Nova\Fields\BelongsToMany;
use Laraning\Surveyor\Fields\PolicyFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class Scope extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Laraning\\Surveyor\\Models\\Scope';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['name'];

    /**
     * Show in the default resources sidebar?
     * @var boolean
     */
    public static $displayInNavigation = false;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        $fields = [
            ID::make()->sortable()->onlyOnForms(),

            Text::make('Name'),
            Text::make('Code'),
            Select::make('Profile')->options(Profile::all()->pluck('name', 'id'))->displayUsingLabels(),
            Text::make('Scope Class')->help('Fully qualified Class name'),

            BelongsToMany::make('Profiles', 'profiles', \App\Nova\Surveyor\Profile::class)
        ];

        return $fields;
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
