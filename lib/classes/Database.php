<?php

/*This class is used for connecting to a database*/

class Database {

  /**
   * Method for connecting to a database
   */
  protected function connect() {

    //Provide database information to data source name
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_DB;

    //Create connection to a database
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);

    //Set fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Return connection
    return $pdo;
  }
}
