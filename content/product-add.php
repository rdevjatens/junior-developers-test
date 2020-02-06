<?php

  $productAddController = new ProductAddController();
  $productAddController->getAction();

?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
  <div class="product-add">
    <label for='sku'><h4>SKU</h4></label> <input name="sku" id='sku' placeholder="TR123456789"><br>
    <label for='name'><h4>NAME</h4></label> <input name="name" id='name' placeholder="Acme DISK"><br>
    <label for='price'><h4>PRICE</h4></label> <input name="price" id='price' placeholder="1.00"><br>
    <select name="type-switcher" id="type-switcher">
      <option value="Size">Size</option>
      <option value="Dimensions">Dimensions</option>
      <option value="Weight">Weight</option>
    </select>
    <span class="removable"><br><label for="size"><h4>SIZE</h4><input name="size" id="size" placeholder="1000"></label></span>
  </div>
  <div class="action-buttons">
    <input type="submit" value="ADD PRODUCT" name="add-product" id="add-product">
    <button name="cancel" id="cancel">CANCEL</button>
  </div>
</form>
