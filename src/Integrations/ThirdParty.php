<?php

namespace Keko94\NovaInlineRelationship\Integrations;

abstract class ThirdParty
{
    /**
     * @var mixed
     */
    protected $field;

    /**
     * ThirdPartyContract constructor.
     *
     * @param $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }
}
