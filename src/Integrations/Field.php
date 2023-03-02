<?php

namespace Keko94\NovaInlineRelationship\Integrations;

use Keko94\NovaInlineRelationship\Integrations\Contracts\ThirdPartyContract;

class Field extends ThirdParty implements ThirdPartyContract
{
    /**
     * Fields array from object.
     *
     * @return array
     */
    public function fields(): array
    {
        return [$this->field];
    }
}
