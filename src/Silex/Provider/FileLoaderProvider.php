<?php

  namespace Silex\Provider;

  use Pimple\Container;
  use Pimple\ServiceProviderInterface;


  /**
   * File loader provider.
   *
   * @author Wake Liu <wake.gs@gmail.com>
   */
  class FileLoaderProvider implements ServiceProviderInterface {


    /**
     *
     * Register provider
     *
     */
    public function register (Container $app) {


      /**
       *
       * Seeking files recursively
       *
       */
      $app['floader.seek'] = $app->protect (function ($file, $path) use ($app) {

        if (! is_array ($file))
          $app['floader.load'] ($file, $path);

        else {
          foreach ($file as $p => $f) {

            if (is_array ($f))
              $app['floader.seek'] ($f, "$path/$p");

            else
              $app['floader.load'] ($f, $path);
          }
        }
      });


      /**
       *
       * Load file if exists
       *
       */
      $app['floader.load'] = $app->protect (function ($file, $path) use ($app) {
        file_exists ("$path/$file.php") && require_once "$path/$file.php";
      });


      /**
       *
       * Load whole directory automatically
       *
       */
      $app['floader.autoload'] = $app->protect (function ($path, $recursive = true) use ($app) {

        if (! is_dir ($path))
          return;

        $ls = scandir ($path);

        foreach ($ls as $file) {

          if ($file == '.' || $file == '..')
            continue;

          if (is_dir ("$path/$file") && $recursive)
            $app['floader.autoload'] ("$path/$file", $recursive);

          else if (pathinfo ("$path/$file", PATHINFO_EXTENSION) == 'php')
            require_once "$path/$file";
        }
      });
    }
  }
