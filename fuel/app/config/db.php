<?php
/**
 * Base Database Config.
 *
 * See the individual environment DB configs for specific config information.
 */

//return array(
//	'active' => 'default',
//
//	/**
//	 * Base config, just need to set the DSN, username and password in env. config.
//	 */
//	'default' => array(
//		'type'        => 'pdo',
//		'connection'  => array(
//			'persistent' => false,
//		),
//		'identifier'   => '`',
//		'table_prefix' => '',
//		'charset'      => 'utf8',
//		'enable_cache' => true,
//		'profiling'    => false,
//	),
//
//	'redis' => array(
//		'default' => array(
//			'hostname'  => '127.0.0.1',
//			'port'      => 6379,
//			'timeout'	=> null,
//		)
//	),
//
//);

return array(
    'active' => 'mongo',
    'mongo' => array(
        'default' => array(
            'hostname'   => '127.0.0.1',
            'port' => 27017,
            'database'   => 'optls',
//            'username'   => 'mydb',
//            'password'   => 'mydbpass',
        ),
    ),
);

