/*jQuery code for dynamicaly changing product inputs*/
$(document).ready(function(){
  //variables
  var typeSwitcher = $("#type-switcher");

  typeSwitcher.on("change", function(){
    /*When selected value changes insert coresponding inputs*/
    $(".removable").remove();

    if (typeSwitcher.val() == "Size") {
      typeSwitcher.after("<span class='removable'><br><label for='size'><h4>SIZE</h4><input name='size' placeholder='1000'></label></span>");
    }
    if (typeSwitcher.val() == "Dimensions") {
      typeSwitcher.after("<span class='removable'><br><label for='size'><h4>WIDTH</h4><input name='width' id='width' placeholder='10'></label><br><label for='height'><h4>HEIGHT</h4><input name='height' id='height' placeholder='4'></label><br><label for='length'><h4>LENGTH</h4><input name='length' id='length' placeholder='13'></label></span>");
    }
    if (typeSwitcher.val() == "Weight") {
      typeSwitcher.after("<span class='removable'><br><label for='weight'><h4>WEIGHT</h4><input name='weight' id='weight' placeholder='2'></label></span>");
    }
  });
});
