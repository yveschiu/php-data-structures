<?php

namespace Yveschiu\DataStructures;

class Node
{
    public ?Node $parent;
    public ?Node $left;
    public ?Node $right;
    public int $data;

    public function __construct(int $data, Node $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
        $this->left = null;
        $this->right = null;
    }

    /**
     * find the node with minimum value
     */
    public function min(): Node
    {
        return $this->left ? $this->left->min() : $this;
    }

    /**
     * find the node with maximum value
     */
    public function max(): Node
    {
        return $this->right ? $this->right->max() : $this;
    }

    /**
     * find the successor of this node
     */
    public function successor(): ?Node
    {
        if ($this->right) {
            return $this->right->min();
        }
        $node = $this;
        while ($node->parent && $node->parent->right === $node) {
            $node = $node->parent;
        }
        return $node->parent;
    }

    /**
     * find the predecessor of this node
     */
    public function predecessor(): ?Node
    {
        if ($this->left) {
            return $this->left->max();
        }
        $node = $this;
        while ($node->parent && $node->parent->left === $node) {
            $node = $node->parent;
        }
        return $node->parent;
    }

    /**
     * delete this node from the tree
     */
    public function delete(): void
    {
        $node = $this;
        // 1. the node to be deleted has no child
        if (!$node->left && !$node->right) {
            $node->parent->left === $node
                ? $node->parent->left = null
                : $node->parent->right = null;
        }
        // 2. the node to be deleted has two children
        if ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();
        }
        // 3. the node to be deleted has one child
        // left child
        if ($node->left) {
            $node->parent->left === $node
                ? $node->parent->left = $node->left
                : $node->parent->right = $node->left;
        }
        // right child
        if ($node->right) {
            $node->parent->left === $node
                ? $node->parent->left = $node->right
                : $node->parent->right = $node->right;
        }
    }
}
