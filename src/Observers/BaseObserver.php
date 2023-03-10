<?php

namespace Keko94\NovaInlineRelationshipExtended\Observers;

use Illuminate\Database\Eloquent\Model;
use Keko94\NovaInlineRelationshipExtended\Contracts\RelationshipObservable;

abstract class BaseObserver implements RelationshipObservable
{
    /**
     * Handle updating event for the relationship
     *
     * @param Model $model
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    public function updating(Model $model, $attribute, $value)
    {
    }

    /**
     * Handle creating event for the relationship
     *
     * @param Model $model
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    public function creating(Model $model, $attribute, $value)
    {
    }

    /**
     * Handle created event for the relationship
     *
     * @param Model $model
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    public function created(Model $model, $attribute, $value)
    {
    }
}
