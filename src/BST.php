<?php

namespace Yveschiu\DataStructures;

use Yveschiu\DataStructures\Abstracts\Tree;
use Yveschiu\DataStructures\Node;
use ArgumentCountError;

class BST implements Tree
{
    public Node $root;

    public function __construct(int $data)
    {
        $this->root = new Node($data);
    }

    /**
     * @param array<int> $data
     * create a new BST from an array
     */
    public static function create(array $data): self
    {
        if (count($data) === 0) {
            throw new ArgumentCountError('Cannot create BST from empty array');
        }
        // pick the middle element as the root
        // Just pretend that here a middle element pickup algorithm is implemented
        sort($data);
        $rootIndex = (int) floor(count($data) / 2);
        $bst = new BST($data[$rootIndex]);
        for ($i = 0; $i < count($data); $i++) {
            if ($i === $rootIndex) {
                continue;
            }
            $bst->insert($data[$i]);
        }
        return $bst;
    }

    /**
     * insert a new node with $data into the tree
     */
    public function insert(int $data): Node
    {
        $node = $this->root;
        while ($node) {
            if ($data < $node->data) {
                if ($node->left) {
                    $node = $node->left;
                    continue;
                }
                $node->left = new Node($data, $node);
                return $node->left;
            } else {
                if ($node->right) {
                    $node = $node->right;
                    continue;
                }
                $node->right = new Node($data, $node);
                return $node->right;
            }
        }
    }

    /**
     * search a node with $data in the tree
     */
    public function search(int $data): ?Node
    {
        $node = $this->root;
        while ($node) {
            if ($data === $node->data) {
                return $node;
            }
            $node = $data < $node->data ? $node->left : $node->right;
        }
        return null;
    }

    /**
     * remove the node from the tree
     */
    public function remove(int $data): bool
    {
        $node = $this->search($data);
        $node?->delete();
        return $node !== null;
    }

    /**
     * traverse the tree in order
     */
    public function traverseInOrder(Node $node): void
    {
        $node->left ? $this->traverseInOrder($node->left) : null;
        echo $node->data . ' ';
        $node->right ? $this->traverseInOrder($node->right) : null;
    }

    /**
     * traverse the tree in pre order
     */
    public function traversePreOrder(Node $node): void
    {
        echo $node->data . ' ';
        $node->left ? $this->traversePreOrder($node->left) : null;
        $node->right ? $this->traversePreOrder($node->right) : null;
    }

    /**
     * traverse the tree in post order
     */
    public function traversePostOrder(Node $node): void
    {
        $node->left ? $this->traversePostOrder($node->left) : null;
        $node->right ? $this->traversePostOrder($node->right) : null;
        echo $node->data . ' ';
    }
}
