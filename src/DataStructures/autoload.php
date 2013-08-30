<?php

namespace DataStructures;

function autoload($className)
{
	static $root = __DIR__;
	static $classMap = [
		'DataStructures\\AbstractSet' => 'AbstractSet.php',
		'DataStructures\\AvlTree' => 'AvlTree.php',
		'DataStructures\\BinarySearchTree' => 'BinarySearchTree.php',
		'DataStructures\\BinaryTree' => 'BinaryTree.php',
		'DataStructures\\Collection' => 'Collection.php',
		'DataStructures\\ConditionalMediator' => 'ConditionalMediator.php',
		'DataStructures\\Exception\\EmptyException' => 'Exception/EmptyException.php',
		'DataStructures\\Exception\\Exception' => 'Exception/Exception.php',
		'DataStructures\\Exception\\FunctionException' => 'Exception/FunctionException.php',
		'DataStructures\\Exception\\IndexException' => 'Exception/IndexException.php',
		'DataStructures\\Exception\\KeyException' => 'Exception/KeyException.php',
		'DataStructures\\Exception\\LookupException' => 'Exception/LookupException.php',
		'DataStructures\\Exception\\StateException' => 'Exception/StateException.php',
		'DataStructures\\Exception\\TypeException' => 'Exception/TypeException.php',
		'DataStructures\\HashingMediator' => 'HashingMediator.php',
		'DataStructures\\HashMap' => 'HashMap.php',
		'DataStructures\\HashSet' => 'HashSet.php',
		'DataStructures\\Iterator\\ArrayIterator' => 'Iterator/ArrayIterator.php',
		'DataStructures\\Iterator\\BinaryTreeIterator' => 'Iterator/BinaryTreeIterator.php',
		'DataStructures\\Iterator\\CountableIterator' => 'Iterator/CountableIterator.php',
		'DataStructures\\Iterator\\CountableSeekableIterator' => 'Iterator/CountableSeekableIterator.php',
		'DataStructures\\Iterator\\FilteringIterator' => 'Iterator/FilteringIterator.php',
		'DataStructures\\Iterator\\HashMapIterator' => 'Iterator/HashMapIterator.php',
		'DataStructures\\Iterator\\HashSetIterator' => 'Iterator/HashSetIterator.php',
		'DataStructures\\Iterator\\InOrderIterator' => 'Iterator/InOrderIterator.php',
		'DataStructures\\Iterator\\IteratorCollection' => 'Iterator/IteratorCollection.php',
		'DataStructures\\Iterator\\IteratorToCollectionAdapter' => 'Iterator/IteratorToCollectionAdapter.php',
		'DataStructures\\Iterator\\KeyIterator' => 'Iterator/KeyIterator.php',
		'DataStructures\\Iterator\\LevelOrderIterator' => 'Iterator/LevelOrderIterator.php',
		'DataStructures\\Iterator\\LimitingIterator' => 'Iterator/LimitingIterator.php',
		'DataStructures\\Iterator\\LinkedListIterator' => 'Iterator/LinkedListIterator.php',
		'DataStructures\\Iterator\\LinkedQueueIterator' => 'Iterator/LinkedQueueIterator.php',
		'DataStructures\\Iterator\\LinkedStackIterator' => 'Iterator/LinkedStackIterator.php',
		'DataStructures\\Iterator\\MapIterator' => 'Iterator/MapIterator.php',
		'DataStructures\\Iterator\\MappingIterator' => 'Iterator/MappingIterator.php',
		'DataStructures\\Iterator\\PreOrderIterator' => 'Iterator/PreOrderIterator.php',
		'DataStructures\\Iterator\\PostOrderIterator' => 'Iterator/PostOrderIterator.php',
		'DataStructures\\Iterator\\QueueIterator' => 'Iterator/QueueIterator.php',
		'DataStructures\\Iterator\\SeekableIterator' => 'Iterator/SeekableIterator.php',
		'DataStructures\\Iterator\\SetIterator' => 'Iterator/SetIterator.php',
		'DataStructures\\Iterator\\SkippingIterator' => 'Iterator/SkippingIterator.php',
		'DataStructures\\Iterator\\SlicingIterator' => 'Iterator/SlicingIterator.php',
		'DataStructures\\Iterator\\SortedMapIterator' => 'Iterator/SortedMapIterator.php',
		'DataStructures\\Iterator\\SortedSetIterator' => 'Iterator/SortedSetIterator.php',
		'DataStructures\\Iterator\\StackIterator' => 'Iterator/StackIterator.php',
		'DataStructures\\Iterator\\VectorIterator' => 'Iterator/VectorIterator.php',
		'DataStructures\\LinkedList' => 'LinkedList.php',
		'DataStructures\\LinkedNode' => 'LinkedNode.php',
		'DataStructures\\LinkedQueue' => 'LinkedQueue.php',
		'DataStructures\\LinkedStack' => 'LinkedStack.php',
		'DataStructures\\Map' => 'Map.php',
		'DataStructures\\Mediator' => 'Mediator.php',
		'DataStructures\\Pair' => 'Pair.php',
		'DataStructures\\Queue' => 'Queue.php',
		'DataStructures\\Set' => 'Set.php',
		'DataStructures\\SortedMap' => 'SortedMap.php',
		'DataStructures\\SortedSet' => 'SortedSet.php',
		'DataStructures\\SplayNode' => 'SplayNode.php',
		'DataStructures\\SplayTree' => 'SplayTree.php',
		'DataStructures\\Stack' => 'Stack.php',
		'DataStructures\\StructureCollection' => 'StructureCollection.php',
		'DataStructures\\Vector' => 'Vector.php',
	];

	if (isset($classMap[$className])) {
		require "$root/{$classMap[$className]}";
	}

}

