# Silex-Struct-Loader

Easy loader for Silex in development.

### Usage

Autoload whole directory:

```
$app->autoload ('path/to/files');
```

Autoload whole directory after specified files loaded:

```
$app->autoload (['load-file-a-first', 'load-file-b-first'], 'path/to/files');
```

Load files:

```
$app->load (['php-file-a', 'php-file-b'], 'path/to/files');
```

Load files with structure:

```
$app->load (['path' => ['php-file-a', 'php-file-b']], 'path/to/files');
```
