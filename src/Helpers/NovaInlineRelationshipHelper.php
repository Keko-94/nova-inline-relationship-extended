<?php

namespace Keko94\NovaInlineRelationship\Helpers;

class NovaInlineRelationshipHelper
{
    /**
     * Returns Observer Classname for a relationship
     *
     * @param $relationship
     *
     * @return string
     */
    public static function getObserver($relationship)
    {
        return '\\Keko94\\NovaInlineRelationship\\Observers\\' . class_basename($relationship) . 'Observer';
    }
}
