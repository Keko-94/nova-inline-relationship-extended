<?php

namespace Tests\Unit;

use Tests\TestCase;
use Laravel\Nova\Fields\HasOne;
use Tests\Resource\EmployeeTeams;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Keko94\NovaInlineRelationshipExtended\NovaInlineRelationshipExtended;
use Keko94\NovaInlineRelationshipExtended\Exceptions\UnsupportedRelationshipType;

class NovaInlineRelationshipExtendedServiceProviderTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * @before
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testItResolvesInlineRelationshipToNovaInlineRelationshipExtendedField()
    {
        $field = $this->employeeResource->resolveFieldForAttribute(new NovaRequest(), 'profile');

        $this->assertInstanceOf(NovaInlineRelationshipExtended::class, $field);
        $this->assertNotInstanceOf(HasOne::class, $field);
    }

    public function testItThrowsErrorForUnsupportedRelationships()
    {
        $employeeWithTeamsResource = new EmployeeTeams($this->employeeModel);

        $this->expectException(UnsupportedRelationshipType::class);
        $employeeWithTeamsResource->resolveFieldForAttribute(new NovaRequest(), 'teams');
    }
}
