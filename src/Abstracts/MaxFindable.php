<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface MaxFindable
{
    /**
     * find the node with maximum value
     */
    public function findMax(): Node;
}
