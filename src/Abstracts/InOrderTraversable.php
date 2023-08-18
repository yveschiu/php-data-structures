<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface InOrderTraversable
{
    /**
     * traverse the tree in-order
     */
    public function traverseInOrder(Node $node): void;
}
