<?php

namespace DataStructures\Iterator;

use DataStructures\BinaryTree;
use DataStructures\LinkedStack;
use DataStructures\Stack;

class PostOrderIterator implements BinaryTreeIterator {

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
	 * @var BinaryTree
	 */
	protected $current;

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

		$this->value = $this->root;
		$this->next();
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
		return $this->current !== null;
	}

	/**
	 * @link http://php.net/manual/en/iterator.key.php
	 * @return NULL
	 */
	function key()
	{
		return $this->current !== null
			? $this->key
			: null;
	}

	/**
	 * @link http://php.net/manual/en/iterator.current.php
	 * @return mixed
	 */
	function current()
	{
		return $this->current->getValue();
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
		if ($this->value !== null) {
			$right = $this->value->getRight();
			if ($right !== null) {
				$this->stack->push($right);
			}
			$this->stack->push($this->value);
			$this->value = $this->value->getLeft();
			$this->next();

			return;
		}

		if ($this->stack->isEmpty()) {
			$this->current = $this->value;
			$this->key++;
			$this->value = null;

			return;
		}

		$this->value = $this->stack->pop();

		$right = $this->value->getRight();
		if ($right !== null && !$this->stack->isEmpty() && $right === $this->stack->peek()) {
			$this->stack->pop();
			$this->stack->push($this->value);
			$this->value = $right;
			$this->next();
		} else {
			$this->current = $this->value;
			$this->key++;
			$this->value = null;
		}
	}

}
