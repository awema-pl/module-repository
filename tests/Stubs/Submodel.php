<?php

namespace AwemaPL\Repository\Tests\Stubs;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Submodel extends BaseModel
{
    protected $fillable = ['name'];
}
