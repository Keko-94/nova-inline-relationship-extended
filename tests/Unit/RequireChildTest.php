<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Keko94\NovaInlineRelationshipExtended\NovaInlineRelationshipExtended;

class RequireChildTest extends TestCase
{
    use WithFaker;

    /**
     * @var NovaInlineRelationshipExtended
     */
    protected $inlineRelationship;

    /**
     * @before
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->inlineRelationship = new NovaInlineRelationshipExtended('inline-relationship');
    }

    public function testThatRequireChildIsFalseByDefault()
    {
        $this->assertFalse($this->inlineRelationship->requireChild);
    }

    public function testThatRequireChildCanBeSetToTrue()
    {
        $this->inlineRelationship->requireChild();

        $this->assertTrue($this->inlineRelationship->requireChild);
    }
}
