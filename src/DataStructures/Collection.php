<?php

namespace DataStructures;

use DataStructures\Iterator\SlicingIterator;

interface Collection extends \Countable, \Traversable {

	/**
	 * @return bool
	 */
	function isEmpty();

	/**
	 * @param callable $callback
	 */
	function each(callable $callback);

	/**
	 * @param callable $f
	 * @return bool
	 */
	function every(callable $f);

	/**
	 * @param callable $map
	 * @return Collection
	 */
	function map(callable $map);

	/**
	 * @param callable $filter
	 * @return Collection
	 */
	function filter(callable $filter);

	/**
	 * @param callable $compare
	 * @return bool
	 */
	function any(callable $compare);

	/**
	 * @param string $separator
	 * @return string
	 */
	function join($separator);

	/**
	 * @param int $n
	 * @return Collection
	 */
	function limit($n);

	/**
	 * @param callable $compare
	 * @return mixed
	 */
	function max(callable $compare = null);

	/**
	 * @param callable $compare
	 * @return mixed
	 */
	function min(callable $compare = null);

	/**
	 * @param callable $f
	 * @return bool
	 */
	function none(callable $f);

	/**
	 * @param $initialValue
	 * @param callable $combine
	 * @return mixed
	 */
	function reduce($initialValue, callable $combine);

	/**
	 * @param int $n
	 * @return Collection
	 */
	function skip($n);

	/**
	 * @param int $start
	 * @param int $count
	 * @return SlicingIterator
	 */
	function slice($start, $count);

	/**
	 * @param bool $preserveKeys
	 * @return array
	 */
	function toArray($preserveKeys = false);

}
