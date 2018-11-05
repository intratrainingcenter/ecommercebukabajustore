function copyCode(codePromo) {
  $("#copyCode"+codePromo).tooltip({
    trigger: 'manual',
    placement: 'top',
    title: 'Copied',
  });
    /* Get the text field */
  var copyCode = document.getElementById("copyCode"+codePromo);
  /* Select the text field */
  copyCode.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");
  /* tooltip the copied text */
  $("#copyCode"+codePromo).tooltip('show');
  setTimeout(function(){
    $("#copyCode"+codePromo).tooltip('hide');
  }, 1000);
}
