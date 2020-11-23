<?php

namespace AwemaPL\Repository\Contracts;

interface CriterionInterface
{
    public function apply($entity);
}