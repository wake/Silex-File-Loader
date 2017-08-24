<?php

  namespace Silex\Application;


  /**
   * File loader trait.
   *
   */
  trait FileLoaderTrait {

    /**
     *
     *
     */
    public function load ($file, $path) {
      return $this['floader.seek'] ($file, $path);
    }


    /**
     *
     *
     */
    public function autoload ($fileOrPath, $pathOrRecursive = true, $recursive = true) {

      // Load specified file before autoloading
      if (is_array ($fileOrPath)) {

        $file = $fileOrPath;
        $path = $pathOrRecursive;

        $this['floader.seek'] ($file, $path);
      }

      else {

        $path = $fileOrPath;

        if (is_bool ($pathOrRecursive) && $pathOrRecursive === false)
          $recursive = $pathOrRecursive;
      }

      return $this['floader.autoload'] ($path, $recursive);
    }
  }
