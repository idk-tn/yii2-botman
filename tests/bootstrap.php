<?php

define('YII_DEBUG', true);
$_SERVER['SCRIPT_NAME'] = '/' . __DIR__;
$_SERVER['SCRIPT_FILENAME'] = __FILE__;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

Yii::setAlias('@tests', __DIR__);

$config = [
	'id' => 'IDK',
	'basePath' => '../',
	'components' => [
		'cache' => [
			'class' => \yii\caching\FileCache::class,
		]
	]
];
$app = new \yii\console\Application($config);
