  $(document).ready(function() {
    $('#datatable').DataTable();
      getdataproduck();
  });

  // change opsi category Barang
  $(document).on('change','.optionCategory',function(){
    $('input[name="start"]').val('');
    $('input[name="end"]').val('');
    var text="";
    codecategory = $(this).val();

    param = {
      codecategory  : codecategory,
      methode       : "post",
      url           : "/laporanbarang/searchCtaegory"
    };
    var items = callAjax(param);
    console.log(items);
    let no = 1;
    $.each( items , function(index, data) {
        text +="<tr><td>"+no+++"</td><td>"+data.nama_barang+"</td><td>"+data.hpp+"</td><td>"+data.harga_jual+"</td><td>"+data.stok+"</td></tr>>";
        console.log(data);
    });
      if (codecategory == '') {
        getdataproduck();
      }else{
        $(document).find('.loaddatareportproduct').html(text);
      }
  });

  // filter with date
  $(document).on('change','input[name="end"]',function(){
    category = $(document).find('.optionCategory').val();
    start = $('input[name="start"]').val();
    end = $(this).val();

    param = {
      idcategory  : category,
      start       : start,
      end         : end,
      url         : "/laporanbarang/filterwithdate",
      methode     : "post"
    }
    var text = '';
    var items = callAjax(param);
    let no = 1;
    $.each( items , function(index,item) {
      console.log(item);
        text +="<tr><td>"+no+++"</td><td>"+item.nama_barang+"</td><td>"+item.hpp+"</td><td>"+item.harga_jual+"</td><td>"+item.stok+"</td></tr>>";
    });
    $(document).find('.loaddatareportproduct').html(text);
  });

  // get data Produck
  function getdataproduck()
  {
    param = {
      url     : "/laporanbarang/getdataproduck",
      methode : "get"
    }
    var text = '';
    var items = callAjax(param);
    let no = 1;
    $.each( items , function(index,item) {
      console.log(item);
        text +="<tr><td>"+no+++"</td><td>"+item.nama_barang+"</td><td>"+item.hpp+"</td><td>"+item.harga_jual+"</td><td>"+item.stok+"</td></tr>>";
    });
    $(document).find('.loaddatareportproduct').html(text);
  }


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

  // function print data
  function printDiv(id){
    var printContents = document.getElementById(id).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
