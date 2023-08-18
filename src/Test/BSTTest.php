<?php

declare(strict_types=1);

namespace Yveschiu\DataStructures\Test;

use PHPUnit\Framework\TestCase;
use Yveschiu\DataStructures\BST;
use ArgumentCountError;

final class BSTTest extends TestCase
{
    public function testBSTCannotBeCreatedFromEmptyArray(): void
    {
        $this->expectException(ArgumentCountError::class);
        $this->createBST([]);
    }

    public function testBSTCanBeCreatedFromOneElementArray(): void
    {
        $bstTree = $this->createBST([1]);
        $this->assertNotNull($bstTree);
    }

    public function testOneElementBSTHasNoSuccessorAndPredecessor(): void
    {
        $bstTree = $this->createBST([1]);
        $this->assertNull($bstTree->root->successor());
        $this->assertNull($bstTree->root->predecessor());
    }

    public function testMaxLeafNodeHasNoSuccessor(): void
    {
        $bstTree = $this->createBST([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $this->assertNull($bstTree->findMax()->successor());
    }

    public function testMinLeafNodeHasNoPredecessor(): void
    {
        $bstTree = $this->createBST([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $this->assertNull($bstTree->findMin()->predecessor());
    }

    public function testBSTCanFindMaxCorrectly(): void
    {
        $bstTree = $this->createBST([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $this->assertEquals(9, $bstTree->findMax()->data);
    }

    public function testBSTCanFindMinCorrectly(): void
    {
        $bstTree = $this->createBST([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $this->assertEquals(1, $bstTree->findMin()->data);
    }

    public function testBSTCanSearchCorrectly(): void
    {
        // arrange
        $ramdonArray =  [59, 10, 20, 30, 35, 45, 50, 60, 70, 85, 100, 105];
        $bstTree = $this->createBST($ramdonArray);
        $searchValue = $ramdonArray[array_rand($ramdonArray)];

        // act
        $searchResult = $bstTree->search($searchValue);

        // assert
        $this->assertEquals($searchValue, $searchResult->data);
    }

    public function testBSTRootHasTwoChildren(): void
    {
        $ramdonArray =  array_map(fn () => random_int(0, 1000), range(0, 10));
        $bstTree = $this->createBST($ramdonArray);
        $this->assertNotNull($bstTree->root->left);
        $this->assertNotNull($bstTree->root->right);
    }

    public function testBSTHasCorrectRoot(): void
    {
        // arrange
        $elementCount = random_int(0, 50);
        $ramdonArray =  array_map(fn () => random_int(0, 1000), range(0, $elementCount));
        $copyArray = $ramdonArray;
        sort($copyArray);
        $rootIndex = (int) floor(count($ramdonArray) / 2);

        // act
        $bstTree = $this->createBST($ramdonArray);

        // assert
        $this->assertEquals($bstTree->root->data, $copyArray[$rootIndex]);
    }

    public function testBSTtraverseInOrderCorrectly(): void
    {
        // arrange
        $elementCount = random_int(0, 50);
        $ramdonArray =  array_map(fn () => random_int(0, 1000), range(0, $elementCount));
        $copyArray = $ramdonArray;
        sort($copyArray);

        // act
        $bstTree = $this->createBST($ramdonArray);
        $bstTree->traverseInOrder($bstTree->root);

        // assert
        $this->expectOutputString(implode(" ", $copyArray) . ' ');
    }

    public function testBSTtraversePreOrderCorrectly(): void
    {
        // arrange
        $ramdonArray = [59, 10, 20, 30, 35, 45, 50, 60, 70, 85, 100, 105];
        $preOrderArray = $ramdonArray;

        // act
        $bstTree = $this->createBST($ramdonArray);
        $bstTree->traversePreOrder($bstTree->root);

        // assert
        $this->expectOutputString(implode(" ", $preOrderArray) . ' ');
    }

    public function testBSTtraversePostOrderCorrectly(): void
    {
        // arrange
        $ramdonArray = [50, 45, 35, 30, 20, 10, 105, 100, 85, 70, 60, 59];
        $postOrderArray = $ramdonArray;

        // act
        $bstTree = $this->createBST($ramdonArray);
        $bstTree->traversePostOrder($bstTree->root);

        // assert
        $this->expectOutputString(implode(" ", $postOrderArray) . ' ');
    }

    private function createBST(array $data): BST
    {
        return BST::create($data);
    }
}
