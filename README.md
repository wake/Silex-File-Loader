# Silex File Loader

An easier way to load php files in Silex 2.

> Only load `.php` file and no need to fill file extension.

### Usage

Autoload whole directory:

```
$app->autoload ('path/to/load');
```

Autoload whole directory after specified files loaded:

```
$app->autoload (['load-file-a-first', 'load-file-b-first'], 'path/to/load');
```

Load files:

```
$app->load (['php-file-a', 'php-file-b'], 'path/to/files');
```

Load files structurally:

```
$app->load (['subpath' => ['php-file-a', 'php-file-b']], 'path/to/files');
```

## Installation

Add in your `composer.json` with following require entry:

```json
{
  "require": {
    "wake/Silex-File-Loader": "*"
  }
}
```

or using composer:

```bash
$ composer require wake/Silex-File-Loader:*
```

then run `composer install` or `composer update`.

## Trait

```php
class MyApplication extends Silex\Application {
  use Silex\Application\FileLoaderTrait;
}
```

## Feedback

Please feel free to open an issue and let me know if there is any thoughts or questions :smiley:

## License

Released under the MIT license
