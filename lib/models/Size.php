<?php

/*This class is used for performing action on size table in the database*/

class Size extends Product implements ProductType {

  /**
   * Method for getting all data about size from a database
   */
  public function getTypeSpecificData($product_id) {
    $sql = "SELECT * FROM size WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$product_id]);

    $results = $stmt->fetchAll();
    return $results;
  }

  /**
   * Method for inserting all size data to a database
   */
  public function setTypeSpecificData($typeSpecificData) {
    $productId = $this->getLastProductId();

    $sql = "INSERT INTO size(Product_ID, Size) VALUES (?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId, $typeSpecificData[0]]);
  }

  /**
   * Method for deleting size from a database
   */
  public function deleteTypeSpecificData($productId) {
    $sql = "DELETE FROM size WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId]);
  }
}
