<?php

namespace AwemaPL\Repository\Tests\Unit\Scopes;

use AwemaPL\Repository\Tests\TestCase;
use AwemaPL\Repository\Tests\Stubs\Model;
use AwemaPL\Repository\Scopes\Clauses\OrderByScope;

class OrderByTest extends TestCase
{
    /** @test */
    public function it_has_mappings()
    {
        $scope = new OrderByScope;

        $this->assertEquals([], $scope->mappings());
    }

    /** @test */
    public function it_returns_ignores_wrong_order_postfix()
    {
        factory(Model::class, 5)->create();

        $scope = new OrderByScope;

        $results = Model::get();

        $this->assertEquals(1, $results->first()->id);

        $results = $scope->scope(new Model, 'id_wrong-order-postfix', '')->get();

        $this->assertEquals(1, $results->first()->id);
    }

    /** @test */
    public function it_orders_by_asc()
    {
        factory(Model::class, 5)->create();

        $scope = new OrderByScope;

        $results = Model::get();

        $this->assertEquals(1, $results->first()->id);

        $results = $scope->scope(new Model, 'id', '')->get();

        $this->assertEquals(1, $results->first()->id);
    }

    /** @test */
    public function it_orders_by_desc()
    {
        factory(Model::class, 5)->create();

        $scope = new OrderByScope;

        $results = Model::get();

        $this->assertEquals(1, $results->first()->id);

        $results = $scope->scope(new Model, 'id_desc', '')->get();

        $this->assertEquals(5, $results->first()->id);
    }
}