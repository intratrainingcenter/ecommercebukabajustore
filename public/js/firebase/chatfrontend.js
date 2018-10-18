$(document).ready(function() {
  // connect database firebase
  var database = firebase.database();
  var master_chat = database.ref('master_chat');

  $(document).find('.form_chats').hide();

    // show form chat
  $(document).on('click','.btn_chat',function(){
      $(document).find('.form_chats').show();

        master_chat.on('child_added',dataMaster);
  });

      // send Message
  $(document).on('click','#btn-chat',function(){

       master_chat.orderByChild('kode_member').equalTo(usercode).on('value',showmaster_chat)

      $('#message').val('');
  });

        // end chatting
  $(document).on('click','.end_chat',function(){

      key_master_chat = $(document).find('input[name="code_master_chat"]').val();
      code_opsi_chat = $(document).find('input[name="code_opsi_chat"]').val();

          master_chat.child(key_master_chat).remove();

         var opsi_chat = database.ref('opsi_chat');

         opsi_chat.child(code_opsi_chat).remove();

       // $(document).find('.form_chats').hide();
       $(document).find('#myModal').modal('hide');
  });
});
// end document ready


var database = firebase.database();

function dataMaster(items)
{
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();

  usercode   = $('#usercode').val();
  var text = '';
    keyMaster = items.val().kode_chat;

    if (items.val().kode_member === usercode) {

      var chats = database.ref('opsi_chat/'+keyMaster);

      $(document).find('input[name="code_master_chat"]').val(items.key);
      $(document).find('input[name="code_opsi_chat"]').val(keyMaster);

      chats.on('child_added', showdata);

    }else{

      text +="<p>Hallo!! Ada yang bisa kami bantu ?</p><time datetime='2009-11-13T20:00'>"+hours+" : "+minutes+"</time>";
      $(document).find('.default_chat').html(text);
    }
}

  // show history message
  function showdata(items)
  {
    var send='';
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
      code = items.val().kode_pembalas[0];
      if (code === 'M') {
        send +='<div class="row msg_container base_sent">'+
        '<div class="col-md-10 col-xs-10">'+
        '<div class="messages msg_sent">'+
        '<p>'+items.val().isi_chat+'</p>'+
        '<time datetime="2009-11-13T20:00">'+items.val().time_chat+'</time>'+
        '</div>'+
        '</div>'+
        '<div class="col-md-2 col-xs-2 avatar">'+
        '<img src="https://www.logolynx.com/images/logolynx/e5/e5ba79334133d2cb362dd639f755a392.png" class=" img-responsive ">'+
        '</div>'+
        '</div>';

    }else{
      send +='<div class="row msg_container base_receive">'+
      '<div class="col-md-2 col-xs-2 avatar">'+
      '<img src="http://www.ectricol.com/media/images/customerservice.png" class=" img-responsive "></div>'+
      '<div class="col-md-10 col-xs-10 ">'+
      '<div class="messages msg_receive" style="background-color:#BFBFBF;">'+
      '<p>'+items.val().isi_chat+'</p>'+
      '<time datetime="2009-11-13T20:00">'+items.val().time_chat+'</time>'+
      '</div></div>'+
      '</div>';

        }
       var text = "<p>Hallo!! Ada yang bisa kami bantu ?</p><time datetime='2009-11-13T20:00'>"+hours+" : "+minutes+"</time>";

       $(document).find('.opsi_chat').append(send);
       $(document).find('.default_chat').html(text);
  }

    // detection has already been chat what have not yet
    function showmaster_chat(items)
    {
      usercode   = $('#usercode').val();
      input      = $('#message').val();

      var date = new Date();
      years = date.getFullYear();  month = date.getMonth(); day = date.getDay(); hours = date.getHours(); minutes = date.getMinutes(); seconds = date.getSeconds();

      var code_chat ='KC-'+years.toString()+month.toString()+day.toString()+hours.toString()+minutes.toString()+seconds.toString();
      tgl_chat = years.toString()+"-"+month.toString()+"-"+day.toString();
      time_chat = hours.toString()+":"+minutes.toString();

          if (items.val()) {
             items.forEach(function(data){

               chat_code = data.val().kode_chat;
             })
             opsi_chat = database.ref('opsi_chat/'+chat_code);
             opsi_chat.push({
               isi_chat      : input,
               kode_pembalas : usercode,
               tgl_chat      : tgl_chat,
               time_chat     : time_chat
             })

          }else{
              var opsi_chat_save = database.ref('opsi_chat/'+code_chat);
              opsi_chat_save.update({
              });

              var master_chat_push = database.ref('master_chat');
              master_chat_push.push({
                kode_chat   : code_chat,
                kode_cs     :'',
                kode_member : usercode
              })
          }
    }

  function showerror(err)
  {
      console.log(err);
  }
