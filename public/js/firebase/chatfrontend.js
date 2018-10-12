$(document).ready(function() {

  var database = firebase.database();

  var master_chat = database.ref('master_chat');


  $(document).on('click','#btn-chat',function(){
    input = $('#message').val();
    // alert(input);
    master_chat.on('value', showmaster_chat, showerror);

  });
  function showmaster_chat(items)
  {
    console.log(items.val());
  };

  var chats = database.ref('opsi_chat/KC-001');

  chats.on('value', showdata, showerror);

  function showdata(items)
  {
    var text='';
    var send='';
    var code='';
    var date = new Date();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    items.forEach(function(data){
      code = data.val().kode_pembalas[0];
      // console.log(code);
      if (code === 'C') {

      send +='<div class="row msg_container base_receive">'+
                '<div class="col-md-2 col-xs-2 avatar">'+
                '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div>'+
                '<div class="col-md-10 col-xs-10 ">'+
                '<div class="messages msg_receive">'+
                '<p>'+data.val().isi_chat+'</p>'+
                '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
                '</div></div>'+
                '</div>';
    }else{

      send +='<div class="row msg_container base_sent">'+
              '<div class="col-md-10 col-xs-10">'+
              '<div class="messages msg_sent">'+
              '<p>'+data.val().isi_chat+'</p>'+
              '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
              '</div>'+
              '</div>'+
              '<div class="col-md-2 col-xs-2 avatar">'+
              '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
              '</div>'+
              '</div>';
        }
    })
       text+="<p>Hallo!! Ada yang bisa kami bantu ?</p><time datetime='2009-11-13T20:00'>"+minutes+" : "+seconds+"</time>";
       $(document).find('.opsi_chat').append(send);
       $(document).find('.default_chat').html(text);
  }

  function showerror(err)
  {
      console.log(err);
  }
});
