function copy_codepromo() {
  var code_promo = document.getElementById("b");
  code_promo.select();
  document.execCommand("copy");
    alert("Copied the text: " + code_promo.value);
}
