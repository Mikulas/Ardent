<?php

namespace DataStructures;

use DataStructures\Iterator\ArrayIterator;

class SkippingIteratorTest extends \PHPUnit_Framework_TestCase {

	function provideCases()
	{
		$insert = [1, 2, 3, 4, 5];

		return [
			'empty' => [
				'insert' => [],
				'skip' => 2,
				'expect' => [],
				'expectPreserveKeys' => [],
			],
			'all' => [
				'insert' => $insert,
				'skip' => count($insert),
				'expect' => [],
				'expectPreserveKeys' => [],
			],
			'2' => [
				'insert' => $insert,
				'skip' => 2,
				'expect' => [3, 4, 5],
				'expectPreserveKeys' => [
					2 => 3,
					3 => 4,
					4 => 5
				],
			],
			'-2' => [
				'insert' => $insert,
				'skip' => -2,
				'expect' => $insert,
				'expectPreserveKeys' => $insert,
			],
		];
	}

	/**
	 * @dataProvider provideCases
	 */
	function testCases(array $insert, $skip, array $expect, array $expectPreserveKeys)
	{
		$iterator = new ArrayIterator($insert);
		$skipped = $iterator->skip($skip);

		$this->assertCount(count($expect), $skipped);
		$this->assertEquals($expect, $skipped->toArray(false));
		$this->assertEquals($expectPreserveKeys, $skipped->toArray(true));

	}

}
