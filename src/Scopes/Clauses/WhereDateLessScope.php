<?php

namespace AwemaPL\Repository\Scopes\Clauses;

use AwemaPL\Repository\Scopes\ScopeAbstract;

class WhereDateLessScope extends ScopeAbstract
{
    public function scope($builder, $value, $scope)
    {
        return $builder->whereDate('created_at', '<', $value);
    }
}