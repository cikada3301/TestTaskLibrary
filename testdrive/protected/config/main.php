<?php

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Library',
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'zxc',
		),

	),
    'aliases' => array(
        'models.dal' => realpath(__DIR__.'/../../protected/models/dal'),
    ),
	'components'=>array(
		'user'=>array(
			'allowAutoLogin'=>true,
		),
        'authorRepository' => array(
            'class' => 'models\dal\AuthorRepository',
        ),
        'bookRepository' => array(
            'class' => 'models\dal\BookRepository',
        ),
		'db'=>require(dirname(__FILE__).'/database.php'),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
	'params'=>array(
		'adminEmail'=>'webmaster@example.com',
	),
);
