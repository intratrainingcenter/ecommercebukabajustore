$(document).ready(function () {
  $.ajax({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
    },
    method:'get',
    url:location.origin+'/settingfront',
    success:function (data) {
      $('title').append(data.setting.nama_web);
      $('.address').html(data.setting.alamat);
      $('.contactUs').html(data.setting.no_telp);
      $('#shortcut-icon').attr('href',location.origin+'/storage/imagesetup/'+data.setting.foto);
      $('.logo').html('<img src='+location.origin+'/storage/imagesetup/'+data.setting.foto+' alt="IMG-LOGO">');

      let itemCategory = '';
      $.each(data.category, function (object,value) {
        itemCategory += '<li class="p-b-10">'+
                        '<a href="'+location.origin+'/shop/'+value.nama_kategori+'" class="stext-107 cl7 hov-cl1 trans-04">'+ value.nama_kategori +'</a>'+
                        '</li>';
      });
      $('.setCategory').html(itemCategory);        

    }
  });
});
