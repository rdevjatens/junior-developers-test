<?php

/*This class is used for showing all products on the Product list page*/

class ProductListView extends ProductView {

  public function showAllProducts() {
    $productCount = $this->getLastProductId();

    for ($productId = $productCount; $productId >= 1; $productId--) {
      $this->showProduct($productId);
    }
  }
}
