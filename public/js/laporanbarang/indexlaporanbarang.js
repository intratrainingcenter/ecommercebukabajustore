$(document).ready(function() {
  $('#datatable').DataTable();
});

// change opsi category Barang
$(document).on('change','.optionCategory',function(){
  codecategory = $(this).val();
  param = {
    codecategory  : codecategory,
    methode       : "post",
    url           : "/laporanbarang/searchCtaegory"
  }
  var items = callAjax(param);
  console.log(items);
});

// get data in laporan controller
function callAjax(param){
  var returny = '';
  var ajax = $.ajax({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
       },
       method : param.methode,
       url    : location.origin+param.url,
       async  : false,
       data   : {param.codecategory},
       success:function (data) {
         returny = data;
      }
     });
   return returny;
};
