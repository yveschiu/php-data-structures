<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface PreOrderTraversable
{
    /**
     * traverse the tree pre-order
     */
    public function traversePreOrder(Node $node): void;
}
