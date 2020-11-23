<?php

namespace AwemaPL\Repository\Tests\Unit\Scopes;

use AwemaPL\Repository\Tests\TestCase;
use Illuminate\Support\Facades\Request;
use AwemaPL\Repository\Tests\Stubs\Model;
use AwemaPL\Repository\Tests\Stubs\Scope;

class ScopeTest extends TestCase
{
    /** @test */
    public function it_resolves_scope_value()
    {
        factory(Model::class, 5)->create();

        $model = factory(Model::class)->create();

        $scope = new Scope;

        $results = $scope->scope(new Model, $model->name, 'full_name')->get();

        $this->assertEquals($model->id, $results->first()->id);
    }
}