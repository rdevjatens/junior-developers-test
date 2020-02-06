<?php

/*This class is used to add products to a database*/

class ProductAddController extends Product {

  /**
   * Method for adding product with users input
   */
  public function addProduct($sku, $name, $price, $type, $typeSpecificData) {

    if($this->verifyAllInputs($sku, $name, $price, $type, $typeSpecificData)) {

      $this->setProduct($sku, $name, $price, $type);
      $productType = new $type();
      $productType->setTypeSpecificData($typeSpecificData);

      echo '<h1 id="wrong-input">Product succesfully added</h1>';
    }
  }

  /**
   * Method for verifying if all user inputs are correct
   */
  private function verifyAllInputs($sku, $name, $price, $type, $typeSpecificData) {

    //Verify if sku and price is correct
    if ($this->verifyInput('/^[A-Z0-9]{4,12}$/', $sku, "Wrong SKU please use only numbers and uppercase letters! Length should be from 4 to 12 symbols.")) return false;
    if ($this->verifyInput('/^[0-9]{1,4}+.[0-9]{2}$/', $price, "Wrong price please use only numbers and dot to separate them . Example 12.99")) return false;

    //Verify if type specific data is correct
    for ($i = 0; $i < count($typeSpecificData); $i++) {
      if ($this->verifyInput('/^[0-9]{1,11}$/', $typeSpecificData[$i], "Please use only integers for size, dimensions and weight. Also don't leave them blank")) return false;
    }

    if($this->verifyUniqueSku($sku)) return false;

    return true;
  }

  /**
   * Method for verifying if single user input is correct (template)
   */
  private function verifyInput($regexString, $value, $errorString) {

    /*Use php regex for checking whether input is correct or no.
    If it is return false, if not return true and error message*/
    if (preg_match($regexString, $value)) {
      return false;
    } else {
      echo '<h1 id="wrong-input">' . $errorString . '</h1>';
      return true;
    }
  }

  /**
   * Method for verifying if there is any user input
   * and if so create array of type specific data and
   * allow to add product to the database
   */
  private function verifyIfEverythingIsSet() {

    if (isset($_POST['sku'])) {

      $typeSpecificData = [];

      if ($_POST['type-switcher'] == "Size") {

        $typeSpecificData[0] = $_POST['size'];

      } elseif ($_POST['type-switcher'] == "Dimensions") {

        $typeSpecificData[0] = $_POST['width'];
        $typeSpecificData[1] = $_POST['height'];
        $typeSpecificData[2] = $_POST['length'];

      } else {

        $typeSpecificData[0] = $_POST['weight'];

      }

      //Add product to a database
      $this->addProduct($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['type-switcher'], $typeSpecificData);
    }
  }

  /**
   * Method for seeing which action is chosen by the user
   */
  public function getAction() {

    if (isset($_POST['add-product'])) {
      $this->verifyIfEverythingIsSet();
    }
    if (isset($_POST['cancel'])) {
      //Go back to Product list page
      header("Location: ?page=product-list");
    }
  }

  /**
   * Method verifying if sku of added product is not yet in a database
   */
   private function verifyUniqueSku($sku) {

     /*Select product with user input sku and if there is a product with this SKU
     display error message and don't allow product to be added to a database*/
     $sql = "SELECT * FROM products WHERE SKU = ?";
     $stmt = $this->connect()->prepare($sql);
     $stmt->execute([$sku]);

     $results = $stmt->fetchAll();
     if (count($results)) {
       echo '<h1 id="wrong-input">Product with this SKU is already in a database!</h1>';
       return true;
     } else {
       return false;
     }
   }
}
