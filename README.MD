JUNIOR DEVELOPERS TEST

Set Up website

  1. Upload contents of this folder to your server root directory
  2. In your mysql DBS create database named "products" and import sql file which is located in sql/products.sql
  3. Everything is set up you can test this website

Functionality and features

  1. There is two web pages url/?page=product-list used for listing all products from a database and url/?page=product-add used for adding products to a database
  2. You can locate to product-add page either by typing url/?page=product-add or by choosing Product add option in the dropdown menu at the top of the page and pressing apply
  3. You can go back to product list page by pressing cancel button or typing url/?page=product-list
  4. In product add page there is input checks for every input. SKU should be only with numbers and uppercase letters. Name may be whatever you want. Price must only include numbers and there must be two decimal numbers (Example 12.67 or 12.00). Size, Dimensions, Weight should only be integer values.
  5. You can't add product if one or more inputs are incorrect or product with this sku is already in a database.
  6. You can also delete product in Product list page by checking(clicking) every product you want to delete and choosing mass delete action in the dropdown menu at the top of the page and pressing apply. You have to click product box not a checkmark
