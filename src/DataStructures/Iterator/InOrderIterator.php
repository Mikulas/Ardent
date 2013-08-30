<?php

namespace DataStructures\Iterator;


use DataStructures\BinaryTree;
use DataStructures\LinkedStack;
use DataStructures\Stack;

class InOrderIterator implements BinaryTreeIterator {

	use IteratorCollection;

	/**
	 * @var Stack
	 */
	protected $stack;

	/**
	 * @var BinaryTree
	 */
	protected $root;

	/**
	 * @var int
	 */
	protected $key = null;

	/**
	 * @var BinaryTree
	 */
	protected $value;

	function __construct(BinaryTree $root = null)
	{
		$this->root = $root;
	}

	/**
	 * @link http://php.net/manual/en/iterator.current.php
	 * @return mixed
	 */
	function current()
	{
		return $this->value->getValue();
	}

	/**
	 * @link http://php.net/manual/en/iterator.next.php
	 * @return void
	 */
	function next()
	{
		if (!$this->valid()) {
			$this->key = null;

			return;
		}

		/**
		 * @var BinaryTree $node
		 */
		$node = $this->stack->pop();

		$right = $node->getRight();
		if ($right !== null) {
			// left-most branch of the right side
			for ($left = $right; $left !== null; $left = $left->getLeft()) {
				$this->stack->push($left);
			}
		}

		if ($this->stack->isEmpty()) {
			$this->value = null;

			return;
		}
		$this->value = $this->stack->peek();

		$this->key++;
	}

	/**
	 * @link http://php.net/manual/en/iterator.key.php
	 * @return int|NULL
	 */
	function key()
	{
		return $this->key;
	}

	/**
	 * @link http://php.net/manual/en/iterator.valid.php
	 * @return boolean
	 */
	function valid()
	{
		return $this->value !== null;
	}

	/**
	 * @link http://php.net/manual/en/iterator.rewind.php
	 * @return void
	 */
	function rewind()
	{
		$this->stack = new LinkedStack();

		for ($current = $this->root; $current !== null; $current = $current->getLeft()) {
			$this->stack->push($current);
		}

		if (!$this->stack->isEmpty()) {
			$this->value = $this->stack->peek();
			$this->key = 0;
		}
	}

}
