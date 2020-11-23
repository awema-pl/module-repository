<?php

namespace AwemaPL\Repository\Scopes\Clauses;

use AwemaPL\Repository\Scopes\ScopeAbstract;

class WhereLikeScope extends ScopeAbstract
{
    public function scope($builder, $value, $scope)
    {
        return $builder->where($scope, 'like', "%$value%");
    }
}