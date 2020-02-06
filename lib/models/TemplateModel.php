<?php

/*This class is used to set page name, title, logo text and so on...*/

class TemplateModel {

  /**
   * Method for setting page name
   */
  function setPageName() {

    //Get page names array
    $pageNames = config('page_names');
    $pageName = "Product list";

    //Loop through page array if array key is in page uri set coresponding page name
    for ($i = 0; $i < count($pageNames); $i++) {
      if (strpos($_SERVER['REQUEST_URI'], array_keys($pageNames)[$i])) {
        $pageName = $pageNames[array_keys($pageNames)[$i]];
      }
    }

    return $pageName;
  }

  /**
   * Method for including page content in template.php
   */
  function setPageContent() {

    //If ?page= is set pass pagename to variable if not use Product list page as default
    $page = isset($_GET['page']) ? $_GET['page'] : 'product-list';

    /*Create path which will be included in template content and replace
    * all backslashes with forward slashes to avoid errors on different computers and hosts
    */
    $path = getcwd() . '/' . config('content_path') . '/' . $page . '.php';
    $path = str_replace('\\', '/', $path);

    //If path doesnt exist include 404 page
    if (! file_exists($path)) {
      $path = getcwd() . '/' . config('content_path') . '/404.php';
      $path = str_replace('\\', '/', $path);
    }

    //Return path to be included
    return $path;
  }
}
