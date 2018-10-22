$(document).ready(function() {
  $('#datatable').DataTable();
});

// change opsi category Barang
$(document).on('change','.optionCategory',function(){
  var text="";
  codecategory = $(this).val();
  param = {
    codecategory  : codecategory,
    methode       : "post",
    url           : "/laporanbarang/searchCtaegory"
  }
  var items = callAjax(param);
  let no = 1;
  $.each(items,function(index, data) {
      text +="<tr><td>"+no+"</td><td>"+data.nama_barang+"</td><td>"+data.hpp+"</td><td>"+data.harga_jual+"</td><td>"+data.stok+"</td><td></td><td></td><td></td></tr>>";
      console.log(data);
  });
  $(document).find('.loaddatabarang').html(text);
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
       data   : param,
       success:function (data) {
         returny = data;
      }
     });
   return returny;
};
