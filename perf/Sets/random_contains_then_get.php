<?php

require __DIR__ . '/../../vendor/autoload.php';

$avl = new \DataStructures\AvlTree();
$splay = new \DataStructures\SplayTree();
$array = [];

$start = microtime(true);
$stop = microtime(true);
$max = 10000;

$a = [];
for ($i = 0; $i < $max; $i++) {
	$array[] = $i;
	$avl->add($i);
	$splay->add($i);
}

for ($i = 0; $i < $max; $i++) {
	$a[] = array_rand($array);
}


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$element = $a[$i];
	if ($avl->contains($element)) {
		$avl->get($element);
	}
}
$stop = microtime(true);
printf("AvlTree:  \t%d contains then gets took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$element = $a[$i];
	if ($splay->contains($element)) {
		$splay->get($element);
	}
}
$stop = microtime(true);
printf("SplayTree:\t%d contains then gets took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$element = $a[$i];
	if (array_search($element, $array, $strict = true) !== false) {
		$array[array_search($element, $array, $strict = true)];
	}
}
array_unique($array, SORT_NUMERIC);
sort($array, SORT_NUMERIC);
$stop = microtime(true);
printf("Array:   \t%d contains then gets took %fs.\n", $max, $stop - $start);

