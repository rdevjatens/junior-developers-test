<?php

/*This class is used for automatically including all files in index.php*/

class Autoloader {

  /**
   * Method for loading classes
   */
  public static function classLoader($className) {
    $path = "lib/classes/";
    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
      return false;
    }

    include_once $fullPath;
  }

  /**
   * Method for loading controllers
   */
  public static function controllersLoader($className) {
    $path = "lib/controllers/";
    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
      return false;
    }

    include_once $fullPath;
  }

  /**
   * Method for loading interfaces
   */
  public static function interfacesLoader($className) {
    $path = "lib/interfaces/";
    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
      return false;
    }

    include_once $fullPath;
  }

  /**
   * Method for loading models
   */
  public static function modelsLoader($className) {
    $path = "lib/models/";
    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
      return false;
    }

    include_once $fullPath;
  }

  /**
   * Method for loading views
   */
  public static function viewsLoader($className) {
    $path = "lib/views/";
    $ext = ".php";
    $fullPath = $path . $className . $ext;

    if (!file_exists($fullPath)) {
      return false;
    }

    include_once $fullPath;
  }
}
