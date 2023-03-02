<?php

namespace Keko94\NovaInlineRelationship\Traits;

trait RequireRelationship
{
    /**
     * Set that at least one child relationship is required.
     *
     * @var bool
     */
    public $requireChild = false;

    /**
     * Require that a child relationship must be created.
     *
     * @return $this
     */
    public function requireChild()
    {
        $this->requireChild = true;

        return $this;
    }
}
