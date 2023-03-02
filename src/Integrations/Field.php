<?php

namespace Keko94\NovaInlineRelationshipExtended\Integrations;

use Keko94\NovaInlineRelationshipExtended\Integrations\Contracts\ThirdPartyContract;

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
