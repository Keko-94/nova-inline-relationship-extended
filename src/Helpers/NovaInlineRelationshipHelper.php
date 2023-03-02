<?php

namespace Keko94\NovaInlineRelationshipExtended\Helpers;

class NovaInlineRelationshipExtendedHelper
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
        return '\\Keko94\\NovaInlineRelationshipExtended\\Observers\\' . class_basename($relationship) . 'Observer';
    }
}
