<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface MinFindable
{
    /**
     * find the node with maximum value
     */
    public function findMin(): Node;
}
