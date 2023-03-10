<?php

namespace Keko94\NovaInlineRelationshipExtended\Integrations;

use ReflectionClass;
use Keko94\NovaInlineRelationshipExtended\Exceptions\ContractMissingException;
use Keko94\NovaInlineRelationshipExtended\Integrations\Field as FieldInterface;
use Keko94\NovaInlineRelationshipExtended\Integrations\Contracts\ThirdPartyContract;

class Integrate
{
    public static function fields($field): array
    {
        $basename = class_basename(get_class($field));

        foreach (config('nova-inline-relationships.third-party') as $namespace) {
            $class = "{$namespace}\\{$basename}";

            if (class_exists($class)) {
                $reflection = new ReflectionClass($class);

                throw_unless(
                    in_array(ThirdPartyContract::class, $reflection->getInterfaceNames()),
                    ContractMissingException::class,
                    sprintf('Third party integration [ %s ] does not implement [ %s ]', $class, ThirdPartyContract::class)
                );

                return (new $class($field))->fields();
            }
        }

        return (new FieldInterface($field))->fields();
    }
}
