$(document).ready(function() {

});
// checked all product return
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

// checked some product to for return
  $(document).on('click','input[name=idProduck]',function(){
    var id = [];
    	$('.idProduck:checked').each(function(){
    		id.push($(this).val());
    	});
    idtransaction = $('input[name=idtransaction]').val();
    $(document).find('.productId').val(id);
    $(document).find('.transactionId').val(idtransaction);
  });

    // make max value input quantity base on quantity producttransaction
    $(document).on('click','.btnAddvalueInput',function(){
      // codetransaction = $('.codeTransaction').val();

      codeProduct = $(this).attr('codeProduct');
      quantityProduct = $(this).attr('attr_qty');
      quantityReturn = $('.quantityReturn'+codeProduct).val();
      console.log(quantityProduct);
      console.log(quantityReturn);
      $('.minus'+codeProduct).removeAttr('disabled', true);

      if (quantityReturn == quantityProduct) {
          $('.plus'+codeProduct).attr('disabled', true);
        }
  });

    // make minus value input quantity
    $(document).on('click','.btnminusvalueInput',function(){
      codeProduct = $(this).attr('codeProduct');
      quantityProduct = $(this).attr('attr_qty');
      quantityReturn = $('.quantityReturn'+codeProduct).val();

      $('.plus'+codeProduct).removeAttr('disabled', true);
      if (quantityReturn == '1') {
         $('.minus'+codeProduct).attr('disabled', true);
      }
  });
