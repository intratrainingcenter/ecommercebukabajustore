$(document).ready(function() {

  var database = firebase.database();
  var master_chat = database.ref('master_chat');



  usercode = $(document).find('.code_user').val();
  master_chat.on('value',function(showmaster_chat){

    let count = 0;
    var chilld_master_chat ="";
    var list_user = '';
    showmaster_chat.forEach(function(data){
      if(data.val().kode_cs === ''){
        count++;
        chilld_master_chat +='<a href="javascript:void(0);" class="dropdown-item notify-item btn_chat" code_chat="'+data.key+'">'+
                          '<div class="notify-icon bg-primary"><i class="mdi mdi-account"></i></div>'+
                          '<p class="notify-details" ><b>'+data.val().kode_chat+'</b><small class="text-muted"></small></p></a>'
        }

      if(data.val().kode_cs === usercode){
        list_user +='<a class="btn_list_member" code_chat_master="'+data.val().kode_chat+'"><li class="contact active ">'+
                    '<div class="wrap">'+
                      '<span class="contact-status busy"></span>'+
                      '<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />'+
                      '<div class="meta">'+
                        '<p class="name">'+data.val().kode_member+'</p>'+
                        '<p class="preview"></p>'+
                    '</div>'+
                    '</div>'+
                  '</li></a>';
      }

    })
    $(document).find('.notif').text(count);
    $(document).find('.list_chat').html(chilld_master_chat);
    $(document).find('#show_list_user').html(list_user);
  });

  $(document).on('click','.btn_list_member',function(){
      code_chat = $(this).attr('code_chat_master');

      opsi_chat = database.ref('opsi_chat/'+code_chat)

      opsi_chat.on('child_added',function(items){

        var date = new Date();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var text = '';

          code = items.val().kode_pembalas[0];

          if (code === 'M') {
              text += '<li class="sent">'+
                      '<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />'+
                      '<p>'+items.val().isi_chat+'</p>'+
                    '</li>';
          }else{
              text +='<li class="replies">'+
                    '<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />'+
                    '<p>'+items.val().isi_chat+'</p>'+
                  '</li>';
          }

          $(document).find('.show_list_chat').append(text);
          $(document).find('#default_code_chat').val(code_chat);
      });
  });


  $(document).on('click','#btn_send_message',function(){

    usercode = $(document).find('.code_user').val();
    codechat = $(document).find('#default_code_chat').val();  

    var date = new Date();
    years = date.getFullYear();  month = date.getMonth(); day = date.getDay(); hours = date.getHours(); minutes = date.getMinutes(); seconds = date.getSeconds();
    var code_chat ='KC-'+years.toString()+month.toString()+day.toString()+hours.toString()+minutes.toString()+seconds.toString();
    tgl_chat = years.toString()+"-"+month.toString()+"-"+day.toString();

    message = $('#input_message').val();

   opsi_chat = database.ref('opsi_chat/'+codechat);
        opsi_chat.push({
          isi_chat      : message,
          kode_pembalas : usercode,
          tgl_chat      : tgl_chat
        })

  });

  $(document).on('click','.btn_chat',function(){
    usercode = $(document).find('.code_user').val();
    codechat = $(this).attr('code_chat');

    update_master = database.ref('master_chat/'+codechat);
    update_master.update({
      kode_cs : usercode
    });
  });

  $(document).find('.btn_chatting',function(){
    alert('berhasil');
  });
});
