<?php

  namespace Silex\Application;


  /**
   * Structure loader trait.
   *
   */
  trait StrcutLoaderTrait {

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
    public function autoload ($path, $recursive = true) {
      return $this['sloader.autoload'] ($path, $recursive);
    }
  }
