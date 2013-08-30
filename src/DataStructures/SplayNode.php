<?php

namespace DataStructures;

class SplayNode {

	public $value;

	/**
	 * @var SplayNode
	 */
	public $left;

	/**
	 * @var SplayNode
	 */
	public $right;

	function __construct($value)
	{
		$this->value = $value;
	}

}