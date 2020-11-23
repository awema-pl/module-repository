<?php

namespace AwemaPL\Repository\Tests\Stubs;

use AwemaPL\Repository\Eloquent\BaseRepository;
use AwemaPL\Repository\Scopes\Clauses\WhereScope;

class InvalidRepository extends BaseRepository
{
    public $searchable = [];

    public function entity()
    {
        return WhereScope::class;
    }
}
