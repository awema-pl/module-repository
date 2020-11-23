<?php

namespace AwemaPL\Repository\Tests\Unit\Criteria;

use AwemaPL\Repository\Tests\TestCase;
use AwemaPL\Repository\Tests\Stubs\Model;
use AwemaPL\Repository\Criteria\FindWhere;

class FindWhereTest extends TestCase
{
    /** @test */
    public function it_applies_clauses()
    {
        factory(Model::class, 5)->create();

        $model = factory(Model::class)->create();

        $criterion = new FindWhere([
            'id' => $model->id,
            ['name', 'like', $model->name]
        ]);

        $results = $criterion->apply(new Model)->get();

        $this->assertEquals($model->id, $results->first()->id);

        $this->assertCount(1, $results);
    }
}