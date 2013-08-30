<?php

namespace DataStructures;

class LinkedNode {

	/**
	 * @var mixed
	 */
	public $value;

	/**
	 * @var LinkedNode
	 */
	public $prev;

	/**
	 * @var LinkedNode
	 */
	public $next;

	function __construct($value)
	{
		$this->value = $value;
	}

	function __clone()
	{
		$this->prev = $this->prev !== null
			? clone $this->prev
			: null;

		$this->next = $this->next !== null
			? clone $this->next
			: null;
	}

}
