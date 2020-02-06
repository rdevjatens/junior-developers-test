<?php

/*This class is used for performing action on product table in the database*/

abstract class Product extends Database {

  /**
   * Method for getting all data about product from a database
   */
  protected function getProduct($productId) {
    $sql = "SELECT * FROM products WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId]);

    $results = $stmt->fetchAll();
    return $results;
  }

  /**
   * Method for inserting all product data to a database
   */
  protected function setProduct($sku, $name, $price, $type) {
    $productId = $this->getLastProductId() + 1;

    $sql = "INSERT INTO products(Product_ID, SKU, Name, Price, Type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId, $sku, $name, $price, $type]);
  }

  /**
   * Method for getting last id in products table
   */
  protected function getLastProductId() {
    $sql = "SELECT MAX(Product_ID) FROM products";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

    return $results[0]["MAX(Product_ID)"];
  }

  /**
   * Method for deleting product from a database
   */
  protected function deleteProduct($productId) {
    $sql = "DELETE FROM products WHERE Product_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$productId]);
  }
}
