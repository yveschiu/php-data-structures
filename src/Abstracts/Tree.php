<?php

namespace Yveschiu\DataStructures\Abstracts;

use Yveschiu\DataStructures\Node;

interface Tree extends PreOrderTraversable, PostOrderTraversable, InOrderTraversable
{
    /**
     * insert a node into the tree
     */
    public function insert(int $data): Node;

    /**
     * delete a node from the tree
     */
    public function remove(int $data): bool;

    /**
     * find a node in the tree
     */
    public function search(int $data): ?Node;
}
