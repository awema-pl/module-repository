<?php

namespace AwemaPL\Repository\Tests\Stubs;

use AwemaPL\Repository\Eloquent\BaseRepository;

class Repository extends BaseRepository
{
    public $searchable = [];

    public function entity()
    {
        return Model::class;
    }
}
