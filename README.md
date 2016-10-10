# yii2-adminlte-gii
yii2 code generator for [AdminLTE](https://github.com/almasaeed2010/AdminLTE) theme.


## Installation

in your main-local.php, add options blow:

```php

$config['bootstrap'][] = 'gii';
$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['127.0.0.1'],
		'controllerNamespace' => 'maxwen\gii\controllers',
		'generators' => [
			'AdminLte Crud' => [
				'class' => 'maxwen\gii\generators\crud\Generator',
			]
		]
	];

```
