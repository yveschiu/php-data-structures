<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface PostOrderTraversable
{
    /**
     * traverse the tree post-order
     */
    public function traversePostOrder(Node $node): void;
}
