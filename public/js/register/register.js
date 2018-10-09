$(document).ready(function(){
  $(document).on('click','.google',function(){
    $.ajax({
      method:'get',
      url: location.origin+"/RegisterMember/auth/google",
      success:function (data) {
        // conlose.log(data);
        alert(data);
      }
    });
  });
});
