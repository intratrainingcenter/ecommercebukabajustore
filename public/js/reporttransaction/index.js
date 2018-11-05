$(document).on('change','.select_transaction',function(){
  category = $('.select_transaction').val();
  start_date = $('.startdate').val();
  end_date = $('.enddate').val();
  param = {
    category  : category,
    start_date  : start_date,
    end_date : end_date,
    url         : "/reporttransaction/filter",
    methode     : "post"
  }

  var items = callAjax(param);
  $('.loaddatareport').html(items);
});

$(document).on('change','.startdate',function(){
  category = $('.select_transaction').val();
  start_date = $('.startdate').val();
  end_date = $('.enddate').val();
  param = {
    category  : category,
    start_date  : start_date,
    end_date : end_date,
    url         : "/reporttransaction/filter",
    methode     : "post"
  }

  var items = callAjax(param);
  $('.loaddatareport').html(items);
});

$(document).on('change','.enddate',function(){
  category = $('.select_transaction').val();
  start_date = $('.startdate').val();
  end_date = $('.enddate').val();
  param = {
    category  : category,
    start_date  : start_date,
    end_date : end_date,
    url         : "/reporttransaction/filter",
    methode     : "post"
  }

  var items = callAjax(param);
  $('.loaddatareport').html(items);
});

function callAjax(param){
  var returny = '';
  var ajax = $.ajax({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
       },
       method : param.methode,
       url    : location.origin+param.url,
       async  : false,
       data   : param,
       success:function (data) {
         returny = data;
      }
     });
   return returny;
};

function printDiv(id){
  var printContents = document.getElementById(id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}
