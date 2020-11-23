<?php

namespace AwemaPL\Repository\Eloquent;

use Illuminate\Http\Request;
use AwemaPL\Repository\Scopes\Scopes;
use Illuminate\Database\Eloquent\Model;
use AwemaPL\Repository\Contracts\ScopesInterface;
use AwemaPL\Repository\Contracts\CriteriaInterface;
use AwemaPL\Repository\Exceptions\RepositoryException;

abstract class RepositoryAbstract implements CriteriaInterface, ScopesInterface
{
    protected $entity;

    protected $searchable = [];

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    abstract public function entity();

    public function withCriteria(array $criteria)
    {
        foreach ($criteria as $criterion) {
            $this->entity = $criterion->apply($this->entity);
        }
        return $this;
    }

    public function scope($request)
    {
        $this->entity = (new Scopes($request, $this->searchable))->scope($this->entity);

        return $this;
    }

    public function reset()
    {
        $this->entity = $this->resolveEntity();
    
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->entity, 'scope' . ucfirst($method))) {

            $this->entity = $this->entity->{$method}(...$parameters);
            
            return $this;
        }
        $this->entity = call_user_func_array([$this->entity, $method], $parameters);

        return $this;
    }

    public function __get($name)
    {
        return $this->entity->{$name};
    }

    protected function resolveEntity()
    {
        $model = app()->make($this->entity());

        if (!$model instanceof Model) {
            throw new RepositoryException(
                "Class {$this->entity()} must be an instance of Illuminate\\Database\\Eloquent\\Model"
            );
        }
        return $model;
    }
}