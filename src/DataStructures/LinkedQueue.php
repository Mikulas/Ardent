<?php

namespace DataStructures;

use DataStructures\Exception\EmptyException;
use DataStructures\Exception\FullException;
use DataStructures\Exception\TypeException;
use DataStructures\Iterator\LinkedQueueIterator;
use DataStructures\Iterator\QueueIterator;

class LinkedQueue implements Queue {

	use StructureCollection;

	/**
	 * @var Pair
	 */
	private $head;

	/**
	 * @var Pair
	 */
	private $tail;

	/**
	 * @var int
	 */
	private $size = 0;

	/**
	 * @return bool
	 */
	function isEmpty()
	{
		return $this->head === null;
	}

	/**
	 * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
	 * @return QueueIterator
	 */
	function getIterator()
	{

		return new LinkedQueueIterator($this->size, $this->clonePair($this->head));
	}

	private function clonePair(Pair $pair = null)
	{
		if ($pair === null) {
			return null;
		}

		$new = new Pair($pair->first, $pair->second);
		for ($current = $new; $current->second !== null; $current = $current->second) {
			$current->second = new Pair(
				$current->second->first,
				$current->second->second
			);
		}

		return $new;
	}

	/**
	 * @param $item
	 * @return void
	 * @throws FullException if the Queue is full.
	 * @throws TypeException when $item is not the correct type.
	 */
	function push($item)
	{
		$pair = new Pair($item, null);

		if ($this->tail !== null) {
			$this->tail = $this->tail->second = $pair;
		} else {
			$this->head = $this->tail = $pair;
		}

		$this->size++;
	}

	/**
	 * @return mixed
	 * @throws EmptyException if the Queue is empty.
	 */
	function pop()
	{
		if ($this->isEmpty()) {
			throw new EmptyException;
		}
		$item = $this->head->first;
		$this->head = $this->head->second;
		$this->size--;

		return $item;
	}

	/**
	 * @return mixed
	 * @throws EmptyException if the Queue is empty.
	 */
	function peek()
	{
		if ($this->isEmpty()) {
			throw new EmptyException;
		}

		return $this->head->first;
	}

	/**
	 * @link http://php.net/manual/en/countable.count.php
	 * @return int
	 */
	function count()
	{
		return $this->size;
	}

	/**
	 * @param callable $compare
	 * @return bool
	 */
	function any(callable $compare)
	{
		for ($n = $this->head; $n !== null; $n = $n->second) {
			if ($compare($n->first)) {
				return true;
			}
		}

		return false;
	}

	/**
	 * @param mixed $compare
	 * @return bool
	 */
	function contains($item)
	{
		for ($n = $this->head; $n !== null; $n = $n->second) {
			if ($item == $n->first) {
				return true;
			}
		}

		return false;
	}

}
