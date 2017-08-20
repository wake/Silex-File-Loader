<?php

  namespace Silex\Application;


  /**
   * Structure loader trait.
   *
   */
  trait StructLoaderTrait {

    /**
     *
     *
     */
    public function load ($file, $path) {
      return $this['sloader.seek'] ($file, $path);
    }


    /**
     *
     *
     */
    public function autoload ($fileOrPath, $pathOrRecursive, $recursive = true) {

      // Load specified file before autoloading
      if (is_array ($fileOrPath)) {

        $file = $fileOrPath;
        $path = $pathOrRecursive;

        $this['sloader.seek'] ($file, $path);
      }

      else {

        $path = $fileOrPath;

        if (is_bool ($pathOrRecursive) && $pathOrRecursive === false)
          $recursive = $pathOrRecursive;
      }

      return $this['sloader.autoload'] ($path, $recursive);
    }
  }
