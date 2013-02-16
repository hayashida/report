<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=127.0.0.1;dbname=report_db',
			'username'   => 'guest',
			'password'   => 'guestp',
		),
        // 'profiling' => true,
	),
);
