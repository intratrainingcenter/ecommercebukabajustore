$(document).ready(function() {

  var database = firebase.database();

  var chats = database.ref('opsi_chat/MESSAGE');

  // var a = chats.where('kode_pembalas', '==', 'KM-');
  chats.on('value', showdata, showerror);
  // console.log(a);

  function showdata(items)
  {
    console.log(items.val());
    // var text='';
    // var receive='';
    // var send='';
    // var code='';
    // var date = new Date();
    // var minutes = date.getMinutes();
    // var seconds = date.getSeconds();
    //
    items.forEach(function(data){
      data.forEach(function(item){
      code = item.val().kode_pembalas[0];
      send +='<div class="col-md-2 col-xs-2 avatar">'+
                '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive "></div>'+
                '<div class="col-md-10 col-xs-10 ">'+
                '<div class="messages msg_receive">'+
                '<p>'+item.val().isi_chat+'</p>'+
                '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
                '</div>'+
                '</div>';

      // receive +='<div class="col-md-10 col-xs-10">'+
      //         '<div class="messages msg_sent">'+
      //         '<p>'+item.val().isi_chat+'</p>'+
      //         '<time datetime="2009-11-13T20:00">'+minutes+" : "+seconds+'</time>'+
      //         '</div>'+
      //         '</div>'+
      //         '<div class="col-md-2 col-xs-2 avatar">'+
      //         '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
      //         '</div>'

              // if (code == 'K') {
              //   $(document).find('.send_chat').html(send);
              // }else if(code == 'C'){
              //   $(document).find('.receive_chat').html(receive);
              // }else{
              //
              // }
      })
    })
       // text+="<p>Hallo!! Ada yang bisa kami bantu ?</p><time datetime='2009-11-13T20:00'>"+minutes+" : "+seconds+"</time>";
       // $(document).find('.default_chat').html(text);
  }

  function showerror(err)
  {
      console.log(err);
  }
});
