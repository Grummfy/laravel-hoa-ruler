<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Cache store
	|--------------------------------------------------------------------------
	|
	| This option controls the cache "store" that will be used for the rules.
	| Simply select the key from the cache configuration to use
	|
	*/
	'cache'	=> env('CACHE_DRIVER', 'file'),
	
	'provider'	=> 'file',
	
	'providers'	=> [
		'file'	=> [
			'type'	=> 'file',
			'path'	=> storage_path() . '/rules/',
		],
	],
];
