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
	$a[] = $rand = mt_rand();
	$avl->add($rand);
	$splay->add($rand);
	$array[] = $rand;
}
$array = array_unique($array, SORT_NUMERIC);
sort($array, SORT_NUMERIC);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$avl->remove($a[$i]);
}
$stop = microtime(true);
printf("AvlTree:   \t%d ordered removals took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$splay->remove($a[$i]);
}
$stop = microtime(true);
printf("SplayTree:\t%d ordered removals took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$index = array_search($a[$i], $array, $strict = true);
	unset($array[$index]);
}
$stop = microtime(true);
printf("Array:   \t%d ordered removals took %fs.\n", $max, $stop - $start);
