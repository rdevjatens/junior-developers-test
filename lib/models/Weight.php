<?php

/*This class is used for performing action on weight table in the database*/

class Weight extends Product implements ProductType {

  /**
   * Method for getting all data about weight from a database
   */
  public function getTypeSpecificData($product_id) {
    $sql = "SELECT * FROM weight WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$product_id]);

    $results = $stmt->fetchAll();
    return $results;
  }

  /**
   * Method for inserting all weight data to a database
   */
  public function setTypeSpecificData($typeSpecificData) {
    $productId = $this->getLastProductId();

    $sql = "INSERT INTO weight(Product_ID, Weight) VALUES (?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId, $typeSpecificData[0]]);
  }

  /**
   * Method for deleting weight from a database
   */
  public function deleteTypeSpecificData($productId) {
    $sql = "DELETE FROM weight WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId]);
  }
}
