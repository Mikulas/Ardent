<?php

namespace DataStructures\Iterator;

use DataStructures\BinaryTree;

class LevelOrderIterator implements BinaryTreeIterator {

	use IteratorCollection;

	/**
	 * @var array
	 */
	protected $queue = [];

	/**
	 * @var BinaryTree
	 */
	protected $root;

	/**
	 * @var BinaryTree
	 */
	protected $value;

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
		$this->queue = [$this->root];
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
		return $this->key !== null;
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
		$node = array_shift($this->queue);

		$left = $node->getLeft();
		if ($left !== null) {
			$this->queue[] = $left;
		}

		$right = $node->getRight();
		if ($right !== null) {
			$this->queue[] = $right;
		}

		if (empty($this->queue)) {
			$this->value = $this->key = null;

			return;
		}

		$this->value = $this->queue[0];
		$this->key++;
	}

}
