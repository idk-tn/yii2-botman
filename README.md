# yii2-botman

Yii2 bindings for [Botman](https://github.com/botman/botman).
 
[![Latest Stable Version](https://poser.pugx.org/idk/yii2-botman/version)](https://packagist.org/packages/idk/yii2-botman)
[![Latest Unstable Version](https://poser.pugx.org/idk/yii2-botman/v/unstable)](//packagist.org/packages/idk/yii2-botman)
[![License](https://poser.pugx.org/idk/yii2-botman/license)](https://packagist.org/packages/idk/yii2-botman)
[![Total Downloads](https://poser.pugx.org/idk/yii2-botman/downloads)](https://packagist.org/packages/idk/yii2-botman)

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run the following command to install the package and add it as a requirement to your project's `composer.json`:

```bash
composer require idk/yii2-botman
```

## Usage

In order to use Yii2 caching system with Botman, initialize your `Botman` instance using this:

```php
// create an instance
$botman = BotManFactory::create($botmanConfig, new \idk\yii2\botman\Cache());
```

## Cache storage

By default, `yii2-botman` will use the default configured `Yii::$app->cache` component.
If you need to use a dedicated cache interface for Botman, you can define it in the `botmanCache` component like the following:

```php
'components' => [
    // default cache used by your app
    'cache' => [
        'class' => 'yii\caching\DbCache',
    ],
    // specific cache for botman
    'botmanCache' => [
        'class' => 'yii\caching\FileCache',
        'cachePath' => '@runtime/botman',
    ],
]
```
