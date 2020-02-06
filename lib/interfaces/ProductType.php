<?php

/*This interface is used for products type specific data size, dimensions and weight*/

interface ProductType {
  public function getTypeSpecificData($product_id);
  public function setTypeSpecificData($typeSpecificData);
  public function deleteTypeSpecificData($productId);
}
