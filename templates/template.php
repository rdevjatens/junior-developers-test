<?php
/*This is template for all website pages*/

$templateView = new TemplateView();

?>

<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <script src="assets/node_modules/jquery/dist/jquery.js"></script>
    <script src="assets/js/shadowAnimation.js"></script>
    <script src="assets/js/selectProduct.js"></script>
    <script src="assets/js/typeSwitcher.js"></script>
    <title><?php $templateView->showName() ?></title>
  </head>

  <body>
    <header>
      <h1><?php $templateView->showName() ?></h1>
    </header>

    <section class="main">
      <?php $templateView->showPageContent() ?>
    </section>
  </body>

</html>
