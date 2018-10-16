$(document).ready(function() {

  var database = firebase.database();
  var master_chat = database.ref('master_chat');

  $(document).on('click','#btn-chat',function(){
    usercode   = $('#usercode').val();
    input      = $('#message').val();

    var date = new Date();
    years = date.getFullYear();  month = date.getMonth(); day = date.getDay(); hours = date.getHours(); minutes = date.getMinutes(); seconds = date.getSeconds();

    var code_chat ='KC-'+years.toString()+month.toString()+day.toString()+hours.toString()+minutes.toString()+seconds.toString();
    tgl_chat = years.toString()+"-"+month.toString()+"-"+day.toString();


     master_chat.orderByChild('kode_member').equalTo(usercode).on('value',function(showmaster_chat){
       if (showmaster_chat.val()) {
          console.log('ada')
          showmaster_chat.forEach(function(data){

            chat_code = data.val().kode_chat;
          })
          opsi_chat = database.ref('opsi_chat/'+chat_code);
          opsi_chat.push({
            isi_chat      : input,
            kode_pembalas : usercode,
            tgl_chat      : tgl_chat
          })

       }else{
           console.log('kosong')
           master_chat.push({
             kode_chat   : code_chat,
             kode_cs     :'',
             kode_member : usercode
           })
           var opsi_chat = database.ref('opsi_chat/'+code_chat);

           opsi_chat.push({
                    isi_chat       : input,
                    kode_pembalas  : usercode,
                    tgl_chat       : tgl_chat
           })
       }
    })

  });

  var code_chat='';
  var code_opsi_chat='';

  code_user = $('#usercode').val();
  master_chat.orderByChild('kode_member').equalTo(code_user).on('value',function(master_chat_child){
    master_chat_child.forEach(function(data){

      code_chat = data.val().kode_chat;
    })
    if (code_chat) {
      code_opsi_chat = code_chat;
    }else{
      code_opsi_chat = '';
    }

    var chats = database.ref('opsi_chat/'+code_opsi_chat);

    chats.on('child_added', showdata);
})

  function showdata(items)
  {
    var text='';
    var send='';
    var code='';
    var date = new Date();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

      code = items.val().kode_pembalas[0];
      // console.log(items.val());
      if (code === 'C') {

      send +='<div class="row msg_container base_receive">'+
                '<div class="col-md-2 col-xs-2 avatar">'+
                '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div>'+
                '<div class="col-md-10 col-xs-10 ">'+
                '<div class="messages msg_receive">'+
                '<p>'+items.val().isi_chat+'</p>'+
                '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
                '</div></div>'+
                '</div>';
    }else{

      send +='<div class="row msg_container base_sent">'+
              '<div class="col-md-10 col-xs-10">'+
              '<div class="messages msg_sent">'+
              '<p>'+items.val().isi_chat+'</p>'+
              '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
              '</div>'+
              '</div>'+
              '<div class="col-md-2 col-xs-2 avatar">'+
              '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
              '</div>'+
              '</div>';
        }
       text+="<p>Hallo!! Ada yang bisa kami bantu ?</p><time datetime='2009-11-13T20:00'>"+minutes+" : "+seconds+"</time>";
       $(document).find('.opsi_chat').append(send);
       $(document).find('.default_chat').html(text);
  }

  function showerror(err)
  {
      console.log(err);
  }
});
