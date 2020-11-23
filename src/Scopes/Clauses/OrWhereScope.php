<?php

namespace AwemaPL\Repository\Scopes\Clauses;

use AwemaPL\Repository\Scopes\ScopeAbstract;

class OrWhereScope extends ScopeAbstract
{
    public function scope($builder, $value, $scope)
    {
        return $builder->orWhere($scope, $value);
    }
}