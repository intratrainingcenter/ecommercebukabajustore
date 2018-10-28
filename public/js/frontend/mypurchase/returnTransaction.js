$(document).ready(function() {

  disabled();

  $(document).on('click','input[name=checkbox]',function(){

      $('input:checkbox').not(this).prop('checked', this.checked);
      idtransaction = $('input[name=idtransaction]').val();
      var id = [];
      	$('input[name=idProduck]:checked').each(function(){
      		id.push($(this).val());
    });
    $(document).find('.productId').val(id);
    $(document).find('.transactionId').val(idtransaction);
  });

  $(document).on('click','input[name=idProduck]',function(){
    idProduck = $('input[name=idProduck]:checked').val();
    idtransaction = $('input[name=idtransaction]').val();
    $(document).find('.productId').val(idProduck);
    $(document).find('.transactionId').val(idtransaction);
  });

    // make max value input quantity base on quantity producttransaction
    $(document).on('click','.plus',function(){
      quantityProduck = parseInt($('.quantityProduck').val());
      quantityReturn = parseInt($('.quantityReturn').val());

      $('.minus').removeAttr('disabled', true);

      if (quantityReturn == quantityProduck) {
         $('.plus').attr('disabled', true);
      }
  });

    // make minus value input quantity
    $(document).on('click','.minus',function(){

      quantityReturn = parseInt($('.quantityReturn').val());

      $('.plus').removeAttr('disabled', true);

      if (quantityReturn == '1') {
         $('.minus').attr('disabled', true);
      }
  });

  // function chek value in quantity Produck
  function disabled()
  {
    quantityProduck = parseInt($('.quantityProduck').val());
    quantityReturn = parseInt($('.quantityReturn').val());

    if (quantityReturn == quantityProduck) {
       $('.plus').attr('disabled', true);
    }
    if (quantityReturn == '1') {
      $('.minus').attr('disabled', true);
    }
  }

});
