<?php

require __DIR__ . '/../../vendor/autoload.php';

$avl = new \DataStructures\AvlTree();
$splay = new \DataStructures\SplayTree();
$array = [];

$start = microtime(true);
$stop = microtime(true);
$max = 10000;
$i = 0;


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$avl->add($i);
}
$stop = microtime(true);
printf("AvlTree:  \t%d ordered additions took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$splay->add($i);
}
$stop = microtime(true);
printf("SplayTree:\t%d ordered additions took %fs.\n", $max, $stop - $start);


$start = microtime(true);
for ($i = 0; $i < $max; $i++) {
	$array[] = $i;
}
array_unique($array, SORT_NUMERIC);
sort($array, SORT_NUMERIC);
$stop = microtime(true);
printf("Array:   \t%d ordered additions took %fs.\n", $max, $stop - $start);

