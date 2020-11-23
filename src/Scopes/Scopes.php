<?php

namespace AwemaPL\Repository\Scopes;

use AwemaPL\Repository\Scopes\Clauses\WhereScope;
use AwemaPL\Repository\Scopes\Clauses\OrderByScope;
use AwemaPL\Repository\Scopes\Clauses\OrWhereScope;
use AwemaPL\Repository\Scopes\Clauses\WhereLikeScope;
use AwemaPL\Repository\Scopes\Clauses\OrWhereLikeScope;
use AwemaPL\Repository\Scopes\Clauses\WhereDateLessScope;
use AwemaPL\Repository\Scopes\Clauses\WhereDateGreaterScope;

class Scopes extends ScopesAbstract
{
    protected $scopes = [
        'orderBy' => OrderByScope::class,
        'begin' => WhereDateGreaterScope::class,
        'end' => WhereDateLessScope::class,
    ];

    public function __construct($request, $searchable)
    {
        parent::__construct($request);

        foreach ($searchable as $key => $value) {

            if (is_string($key)) {
                $this->scopes[$key] = $this->mappings($value);
            } else {
                $this->scopes[$value] = WhereScope::class;
            }
        }
    }

    protected function mappings($key)
    {
        $mappings = [
            'or' => OrWhereScope::class,
            'like' => WhereLikeScope::class,
            'orLike' => OrWhereLikeScope::class,
        ];

        return $mappings[$key] ?? WhereScope::class;
    }
}