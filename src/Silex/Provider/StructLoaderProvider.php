<?php

  namespace Silex\Provider;

  use Pimple\Container;
  use Pimple\ServiceProviderInterface;


  /**
   * Struct loader provider.
   *
   * @author Wake Liu <wake.gs@gmail.com>
   */
  class StructLoaderProvider implements ServiceProviderInterface {


    /**
     *
     * @param  Container $app
     */
    public function register (Container $app) {


      /**
       *
       *
       */
      $app['sloader.seek'] = $app->protect (function ($file, $path) use ($app) {

        if (! is_array ($file))
          $app['sloader.load'] ($file, $path);

        else {
          foreach ($file as $p => $f) {

            if (is_array ($f))
              $app['sloader.seek'] ($f, "$path/$p");

            else
              $app['sloader.load'] ($f, $path);
          }
        }
      });


      /**
       *
       *
       */
      $app['sloader.load'] = $app->protect (function ($file, $path) use ($app) {
        file_exists ("$path/$file.php") && require_once "$path/$file.php";
      });


      /**
       *
       *
       */
      $app['sloader.autoload'] = $app->protect (function ($path, $recursive = true) use ($app) {

        if (! is_dir ($path))
          return;

        $ls = scandir ($path);

        foreach ($ls as $file) {

          if ($file == '.' || $file == '..')
            continue;

          if (is_dir ("$path/$file") && $recursive)
            $app['sloader.autoload'] ("$path/$file", $recursive);

          else if (pathinfo ("$path/$file", PATHINFO_EXTENSION) == 'php')
            require_once "$path/$file";
        }
      });
    }
  }
