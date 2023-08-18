<?php


namespace Yveschiu\DataStructures;

require_once dirname(__DIR__) . "/vendor/autoload.php";

class Main
{
    public static function main(): void
    {
        $ramdonArray =  array_map(fn () => random_int(0, 1000), range(0, 10));
        $bstTree = BST::create($ramdonArray);
        echo "BST Tree created from random array: " . PHP_EOL . implode(" ", $ramdonArray) . PHP_EOL;
        echo "BST tree root: " . $bstTree->root->data . PHP_EOL;
        echo "BST Tree in-order traversal: " . PHP_EOL;
        $bstTree->traverseInOrder($bstTree->root);
        echo PHP_EOL;
        echo "BST Tree pre-order traversal: " . PHP_EOL;
        $bstTree->traversePreOrder($bstTree->root);
        echo PHP_EOL;
        echo "BST Tree post-order traversal: " . PHP_EOL;
        $bstTree->traversePostOrder($bstTree->root);
        echo PHP_EOL;
    }
}

Main::main();
