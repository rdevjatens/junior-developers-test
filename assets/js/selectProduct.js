/*jQuery code for styling hovering and clicking on products*/
$(document).ready(function(){
  //variables
  var product = $(".product");
  var checkbox = $(".container:hover input ~ .checkmark");
  var applyButton = $("#apply-button");

  /*Disable checboxes in the start so when you clik on them in it will apply
  styles for the whole product not only for checkbox*/
  $(".product input").attr('disabled','disabled');

  product.hover(function() {
  //When hovered add boxshadow animation to text and product box
    if ($(this).find(".checkmark").css("background-color") == "rgb(238, 238, 238)") {
      $(this).animate({boxShadow: "12px 12px"}, 170);
      $(this).css("text-shadow", "2px 2px rgba(255, 67, 101, 1)");
    }
  }, function() {
    //When mouse is no longer hovered over products change product style to default
    if ($(this).find(".checkmark").css("background-color") == "rgb(238, 238, 238)") {
      $(this).animate({boxShadow: "8px 8px"}, 170);
      $(this).css("text-shadow", "0px 0px");
    }
  });

  product.on("click", function() {
    /*When clicked on a product compare if checkbox backgrund color is gray or
    black. If gray than change checkbox to checked state add bigger shadowbox
    for product box and text. If black than set everything to default*/
    if ($(this).find(".checkmark").css("background-color") == "rgb(238, 238, 238)") {
      $(this).css("boxShadow", "12px 12px");
      $(this).css("text-shadow", "2px 2px rgba(255, 67, 101, 1)");
      $(this).find("input").attr("checked", "checked");
    } else {
      $(this).css("boxShadow", "8px 8px");
      $(this).css("text-shadow", "0px 0px");
      $(this).find("input").removeAttr("checked");
    }
  });

  applyButton.on("click", function(){
    /*When apply button is pressed undisable checkbox so php can see which
    products are selected*/
    $(".product input").removeAttr('disabled');
  });
});
