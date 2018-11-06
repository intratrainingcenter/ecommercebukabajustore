$(document).ready(function() {

  $(document).find('#live-chat').hide();
  $(document).find('.end_chat').hide();

});
firebase.database().ref('master_chat').on('child_added',dataMaster);
// end document ready

    // show form chat
  $(document).on('click','.start_chat',function(){
      $(document).find('#box-chat').hide();
      $(document).find('#live-chat').show();

  });

      // send Message
  $('#form_send_message').on('submit',function(e) {
      e.preventDefault();
      $(document).find('.end_chat').show();

       firebase.database().ref('master_chat').orderByChild('kode_member').equalTo(usercode).once('value').then(showmaster_chat);
  });

   // end chatting
  $(document).on('click','#endchatting',function(e){
    e.preventDefault();

      key_master_chat = $(document).find('input[name="code_master_chat"]').val();
      code_opsi_chat = $(document).find('input[name="code_opsi_chat"]').val();
      var text = '';

        firebase.database().ref('opsi_chat').child(code_opsi_chat).remove();
        firebase.database().ref('master_chat').child(key_master_chat).remove();
       $(document).find('#modal_endchat').modal('hide');
       $(document).find('#box-chat').show();

       $('.opsi_chat').html('');

       text +='<hr><p style="text-align:left;">Customer</p><div class="chat-message clearfix chat-box">\
               <div class="chat-message-content clearfix default_chat">\
               <p>Hallo !! ada yang Bisa Kami Bantu.</p>\
               <span class="chat-time-received">'+hours+':'+minutes+'</span>\
               </div>\
             </div>';
       $(document).find('.opsi_chat').html(text);
  });

  // cancel end chatting
  $(document).on('click','.cancelEndChat',function(){
    $(document).find('#live-chat').show();
  });

// check data is exist or not
function dataMaster(items)
{
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();

  usercode   = $('#usercode').val();
  var text = '';
    keyMaster = items.val().kode_chat;

    if (items.val().kode_member === usercode) {
      var chats = firebase.database().ref('opsi_chat/'+keyMaster);

      $(document).find('input[name="code_master_chat"]').val(items.key);
      $(document).find('input[name="code_opsi_chat"]').val(keyMaster);

      chats.on('child_added', showdata);
      $(document).find('.end_chat').show();

    }else{
      text +='<hr><p style="text-align:left;">Customer</p><div class="chat-message clearfix chat-box">\
              <div class="chat-message-content clearfix default_chat">\
              <p>Hallo !! ada yang Bisa Kami Bantu.</p>\
              <span class="chat-time-received">'+hours+':'+minutes+'</span>\
              </div>\
            </div>';
      $(document).find('.opsi_chat').html(text);
    }
}

//   // show history message
  function showdata(items)
  {
    var send='';
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
      code = items.val().kode_pembalas[0];
      if (code === 'M') {
        send +='<hr><p style="text-align:right;">You</p><div class="chat-message clearfix chat-box">\
					     <div class="chat-message-content clearfix send">\
						   <p>'+items.val().isi_chat+'</p>\
               <span class="chat-time-send">'+items.val().time_chat+'</span>\
      					</div>\
      				</div>';
    }else{
        send +='<hr><p style="text-align:left;">Customer</p><div class="chat-message clearfix chat-box">\
                <div class="chat-message-content clearfix default_chat">\
                <p>'+items.val().isi_chat+'</p>\
                <span class="chat-time-received">'+items.val().time_chat+'</span>\
                </div>\
              </div>';
        }
       $(document).find('.opsi_chat').append(send);
  }

     // detection has already been chat what have not yet
    function showmaster_chat(items)
    {
      usercode   = $('#usercode').val();
      input    = $('input[name=message]').val();

      var date = new Date();
      years = date.getFullYear();  month = date.getMonth(); day = date.getDay(); hours = date.getHours(); minutes = date.getMinutes(); seconds = date.getSeconds();

      var code_chat ='KC-'+years.toString()+month.toString()+day.toString()+hours.toString()+minutes.toString()+seconds.toString();
      tgl_chat = years.toString()+"-"+month.toString()+"-"+day.toString();
      time_chat = hours.toString()+":"+minutes.toString();
          if (items.val()) {
            items.forEach(function(e){
              chatCode= e.val().kode_chat;
            })
             opsi_chat = firebase.database().ref('opsi_chat/'+chatCode);
             opsi_chat.push({
               isi_chat      : input,
               kode_pembalas : usercode,
               tgl_chat      : tgl_chat,
               time_chat     : time_chat
             })

          }else{
              var opsi_chat_save = firebase.database().ref('opsi_chat/'+code_chat);
              opsi_chat_save.push({
                  isi_chat      : input,
                  kode_pembalas : usercode,
                  tgl_chat      : tgl_chat,
                  time_chat     : time_chat
              });

              firebase.database().ref('master_chat').push({
                kode_chat   : code_chat,
                kode_cs     :'',
                kode_member : usercode
              });
            }

        $('#message').val('');
    }
