<?php

namespace DataStructures\Iterator;

use DataStructures\BinaryTree;
use DataStructures\LinkedStack;
use DataStructures\Stack;

class PreOrderIterator implements BinaryTreeIterator {

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
	 * @var BinaryTree
	 */
	protected $value;

	/**
	 * @var int
	 */
	protected $key = null;

	function __construct(BinaryTree $root = null)
	{
		$this->root = $root;
	}

	/**
	 * @link http://php.net/manual/en/iterator.rewind.php
	 * @return void
	 */
	function rewind()
	{
		$this->stack = new LinkedStack();
		$this->stack->push($this->root);

		$this->value = $this->root;

		$this->key = $this->root === null
			? null
			: 0;
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
	 * @link http://php.net/manual/en/iterator.key.php
	 * @return int|NULL
	 */
	function key()
	{
		return $this->key;
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
		/**
		 * @var BinaryTree $node
		 */
		$node = $this->stack->pop();

		$right = $node->getRight();
		if ($right !== null) {
			$this->stack->push($right);
		}

		$left = $node->getLeft();
		if ($left !== null) {
			$this->stack->push($left);
		}

		if ($this->stack->isEmpty()) {
			$this->value = $this->key = null;

			return;
		}
		$this->value = $this->stack->peek();
		$this->key++;
	}

}
