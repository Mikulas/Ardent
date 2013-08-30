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
	$a[] = mt_rand();
}


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$avl->add($a[$i]);
}
$stop = microtime(true);
printf("AvlTree:  \t%d random additions took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$splay->add($a[$i]);
}
$stop = microtime(true);
printf("SplayTree:\t%d random additions took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$array[] = $a[$i];
}
array_unique($array, SORT_NUMERIC);
sort($array, SORT_NUMERIC);
$stop = microtime(true);
printf("Array:   \t%d random additions took %fs.\n", $max, $stop - $start);

