<?php

spl_autoload_register(function ($class) {
	switch ($class) {
		case 'DataStructures\\CollectionTestDriver':
			require __DIR__ . '/DataStructures/CollectionTestDriver.php';
	}
});

require __DIR__ . '/../vendor/autoload.php';