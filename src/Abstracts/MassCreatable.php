<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface MassCreatable
{
    /**
     * @param array<int> $data
     * create a new tree from an array
     */
    public static function create(array $data): self;
}
