<?php

/*This class is used for performing action on dimensions table in the database*/

class Dimensions extends Product implements ProductType {

  /**
   * Method for getting all data about dimensions from a database
   */
  public function getTypeSpecificData($product_id) {
    $sql = "SELECT * FROM dimensions WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$product_id]);

    $results = $stmt->fetchAll();
    return $results;
  }

  /**
   * Method for inserting all dimensions data to a database
   */
  public function setTypeSpecificData($typeSpecificData) {
    $productId = $this->getLastProductId();

    $sql = "INSERT INTO dimensions(Product_ID, Width, Height, Length) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId, $typeSpecificData[0], $typeSpecificData[1], $typeSpecificData[2]]);
  }

  /**
   * Method for deleting dimensions from a database
   */
  public function deleteTypeSpecificData($productId) {
    $sql = "DELETE FROM dimensions WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId]);
  }
}
