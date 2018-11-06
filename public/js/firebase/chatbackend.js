$(document).ready(function() {

  var database = firebase.database();
  var master_chat = database.ref('master_chat');

  usercode = $(document).find('.code_user').val();
  $(document).find('.message-input').hide();

    master_chat.on('value',showmaster_chat)
    master_chat.on('child_removed',function(removed){
      var removecodeChat = $(document).find('#default_code_chat').val();
      if (removed.val().kode_chat == removecodeChat){
          $('.show_list_chat').html('');
          $(document).find('.username').html('');
      }
    })

   // btn add chats member to list member
    $(document).on('click','.btn_add_tolistUser',function(){
      usercode = $(document).find('.code_user').val();
      codechat = $(this).attr('code_chat');
      database.ref('master_chat/'+codechat).update({
        kode_cs : usercode,
      });
    });


  $(document).on('click','.btn_list_member',function(){
      $(document).find('.show_list_chat').empty();
      $(document).find('.message-input').show();

      code_chat = $(this).attr('code_chat_master');
      name_user = $(this).attr('name_user');

        opsi_chat = database.ref('opsi_chat/'+code_chat)

        opsi_chat.on('child_added',function(items){
          var text = '';

            code = items.val().kode_pembalas[0];

            if (code === 'M') {
                text += '<li class="sent">'+
                        '<p>'+items.val().isi_chat+'<br><time class="pull-right">'+items.val().time_chat+'</time></p>'+
                      '</li>';
            }else{
                text +='<li class="replies">'+
                      '<p>'+items.val().isi_chat+'<br><time class="pull-right">'+items.val().time_chat+'</time></p>'+
                    '</li>';
            }

            $(document).find('.show_list_chat').append(text);
            $(document).find('.username').text(name_user);
            $(document).find('#default_code_chat').val(code_chat);
        });
    });

    // send message with enter
    $('#input_message').on('change',function(){
      usercode = $(document).find('.code_user').val();
      codechat = $(document).find('#default_code_chat').val();
      var date = new Date();
      years = date.getFullYear();  month = date.getMonth(); day = date.getDay(); hours = date.getHours(); minutes = date.getMinutes(); seconds = date.getSeconds();
      var code_chat ='KC-'+years.toString()+month.toString()+day.toString()+hours.toString()+minutes.toString()+seconds.toString();
      tgl_chat = years.toString()+"-"+month.toString()+"-"+day.toString();
      time_chat = hours.toString()+":"+minutes.toString();

      message = $('#input_message').val();

     opsi_chat = database.ref('opsi_chat/'+codechat);
          opsi_chat.push({
            isi_chat      : message,
            kode_pembalas : usercode,
            tgl_chat      : tgl_chat,
            time_chat     : time_chat
          })

        $('.preview'+codechat).html(message);
        $('#input_message').val('');
    })

});
// end document ready

  var database = firebase.database();

   function showmaster_chat(items)
   {
        let count = 0;
        var chilld_master_chat ="";
        var list_user = '';
        var datausers = getdatauser();

        items.forEach(function(data){
          if(data.val().kode_cs === ''){
            count++;
            var datauserinnotif = datausers.filter( obj => obj.kode_user ===data.val().kode_member)[0];
            chilld_master_chat +='<a href="javascript:void(0);" class="dropdown-item notify-item btn_add_tolistUser" code_chat="'+data.key+'">'+
            '<div class="notify-icon bg-primary"><i class="mdi mdi-account"></i></div>'+
            '<p class="notify-details" ><b>'+datauserinnotif.name+'</b><small class="text-muted"></small></p></a>'
          }

          if(data.val().kode_cs === usercode){
            var isi = '';
            opsi_chat = database.ref('opsi_chat/'+data.val().kode_chat);
            opsi_chat.on('value',function(item){
              item.forEach(function(e){
                isi = e.val().isi_chat;
                console.log(isi);
              })
                code = data.val().kode_chat;
                $('.preview'+code).append(isi);
            })
            var img = '';
            var datauser = datausers.filter( obj => obj.kode_user ===data.val().kode_member)[0];
            if (datauser.avatar == '') {
              img = "https://www.clipartmax.com/png/middle/15-153150_user-icon-vector-clip-art-clipart-pink-person-icon-png.png";
            }else if (datauser.kode_jabatan == 'member' && datauser.provider_id != null) {
              img = datauser.avatar_original;
            }else {
              img = "asset('storage/imageuser'.'/'."+datauser.avatar+")";
            }

              list_user +='<a class="btn_list_member" code_chat_master="'+data.val().kode_chat+'" name_user="'+datauser.name+'" ><li class="contact active ">'+
              '<div class="wrap">'+
              '<span class="contact-status busy"></span>'+
              '<img src="'+img+'" alt="" />'+
              '<div class="meta">'+
              '<p class="name ">'+datauser.name+'</p>'+
              '<p class="preview'+data.val().kode_chat+'"></p>'+
              '</div>'+
              '</div>'+
              '</li></a><hr>';
          }
        })

        $(document).find('.notif').text(count);
        $(document).find('.list_chat').html(chilld_master_chat);
        $(document).find('#show_list_user').html(list_user);
  };

// ajax get data user
function getdatauser(){
  var returny = '';
  var ajax = $.ajax({
       headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
       },
       method:'get',
       url: location.origin+"/chats/user",
       async:false,
       success:function (data) {
         returny = data;
      }
     });
   return returny;
};
