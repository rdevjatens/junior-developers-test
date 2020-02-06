<?php

  $productListView = new ProductListView();
  $productListController = new ProductListController();
  $productListController->getAction();

?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
  <div class='product-list'>
    <?php $productListView->showAllProducts(); ?>
  </div>
  <div class="action-buttons">
    <select id='action-selector' name='action-selector'>
      <option value='mass-delete'>Mass delete action</option>
      <option value='product-add'>Add product</option>
    </select>
    <input type="submit" id="apply-button" name="apply" value="APPLY">
  </div>
</form>
