<?php

/*This class is used to show all data of single product*/

class ProductView extends Product {

  /**
   * Method for showing all data of a product which will be displayed in Product list page
   */
  public function showProduct($productId) {

    //Get product data array from a database
    $results = $this->getProduct($productId);

    //Show main data like sku, name and price first
    foreach($results as $result) {

      if (isset($result['SKU'])) { ?>
        <div class="product">
          <label class="container">
            <input type="checkbox" name="<?php echo $result['Product_ID'] ?>" class="checkbox">
            <span class="checkmark"></span>
          </label>
      <?php
        echo '<h1>' . $result['SKU'] . '</h1>';
        echo '<h1>' . $result['Name'] . '</h1>';
        echo '<h1>$' . $result['Price'] . '</h1>';

        //Get type of a product to create a new object
        $type = $result['Type'];
      }

      //Create object of product type
      $productType = new $type();

      //Show type specific data like size, dimensions or weight
      $results = $productType->getTypeSpecificData($productId);
      foreach ($results as $result) {

        if (isset($result['Size'])) echo '<h3>Size : ' . $result['Size'] . 'MB</h3>';
        if (isset($result['Width'])) echo '<h3>Dimensions : ' . $result['Width'] . 'x';
        if (isset($result['Height'])) echo $result['Height'] . 'x';
        if (isset($result['Length'])) echo $result['Length'] . '</h3>';
        if (isset($result['Weight'])) echo '<h3>Weight : ' . $result['Weight'] . 'KG</h3>';

      }
      echo '</div>';
    }
  }
}
