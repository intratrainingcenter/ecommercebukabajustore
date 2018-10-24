$(document).ready(function () {
  $.ajax({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
    },
    method:'get',
    url:location.origin+'/showsetting',
    success:function (data) {
      $('title').append(data.nama_web);
      $('#shortcut-icon').attr('href',location.origin+'/storage/imagesetup/'+data.foto);
    }
  });
});
