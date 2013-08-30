<?php

require __DIR__ . '/../../vendor/autoload.php';

$avl = new \DataStructures\AvlTree();
$splay = new \DataStructures\SplayTree();
$array = [];

$start = microtime(true);
$stop = microtime(true);
$max = 10000;
$contains = 5 * $max;

$a = [];
for ($i = 0; $i < $max; $i++) {
	$a[] = $array[] = $rand = mt_rand();
	$avl->add($rand);
	$splay->add($rand);
}
$array = array_unique($array, SORT_NUMERIC);
sort($array, SORT_NUMERIC);

$b = [];
for ($i = 0; $i < $contains; $i++) {
	$index = array_rand($a);
	$b[] = $a[$index];
}


$start = microtime(true);
for ($i = 0; $i < $contains; $i++) {
	$avl->contains($b[$i]);
}
$stop = microtime(true);
printf("AvlTree:   \t%d random contains on size %d took %fs.\n", $contains, $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $contains; $i++) {
	$splay->contains($b[$i]);
}
$stop = microtime(true);
printf("SplayTree:\t%d random contains on size %d took %fs.\n", $contains, $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $contains; $i++) {
	$index = array_search($b[$i], $array, $strict = true);
}
$stop = microtime(true);
printf("Array:   \t%d random contains on size %d took %fs.\n", $contains, $max, $stop - $start);
