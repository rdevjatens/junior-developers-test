<?php

/*This class is used for performing the chosen action in product list page*/

class ProductListController extends Product {

  /**
   * Method for deleting products with checked checkboxes
   */
  public function deleteSelectedProducts() {

    //Get last product id number in product db
    $productCount = $this->getLastProductId();

    /*Loop through all product in the database and delete the one's that
    is equal to selected product id*/
    for ($productId = 0; $productId <= $productCount; $productId++) {

      if (isset($_POST[$productId])) {
        //Get product data
        $product = $this->getProduct($productId);

        //Set product type
        $typeSpecificData = new $product[0]['Type'];

        //Delete type specific data like size, dimensions or weight
        $typeSpecificData->deleteTypeSpecificData($productId);

        //Delete product from database
        $this->deleteProduct($productId);
      }

    }
  }

  /**
   * Method for seeing which action is chosen by the user
   */
  public function getAction() {

    //If apply button is clicked
    if (isset($_POST['apply'])) {
      if ($_POST['action-selector'] == "mass-delete") {
        $productListController = new ProductListController();
        $productListController->deleteSelectedProducts();

        header("Location: ?page=product-list");
      } elseif ($_POST['action-selector'] == "product-add") {
        header("Location: ?page=product-add");
      }
    }
  }
}
