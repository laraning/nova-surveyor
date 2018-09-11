<?php

namespace Laraning\NovaSurveyor\Resources;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\BelongsToMany;
use Laraning\Surveyor\Fields\PolicyFields;
use Laravel\Nova\Http\Requests\NovaRequest;

class Profile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Laraning\\Surveyor\\Models\\Profile';

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

            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'string'),

            Text::make('Code', 'code')
                ->sortable()
                ->rules('required', 'string'),

            BelongsToMany::make('Users', 'users', \App\Nova\User::class)
                         ->sortable(),

            BelongsToMany::make('Scopes', 'scopes', \App\Nova\Surveyor\Scope::class)
                         ->sortable(),

            BelongsToMany::make('Policies', 'policies', \App\Nova\Surveyor\Policy::class)
                         ->fields(new PolicyFields)
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
