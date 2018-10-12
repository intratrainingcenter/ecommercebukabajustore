@extends('frontend.chat.component.asset')
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
<script src="{{ asset('js/firebase/chatfrontend.js') }}"></script>
@endsection

  <div class="container" style="z-index:100;">
      <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
          <div class="col-xs-12 col-md-12">
          	<div class="panel panel-default">
                  <div class="panel-heading top-bar">
                      <div class="col-md-8 col-xs-6">
                          <p class="panel-title"><i class="glyphicon glyphicon-comment"></i>  {{Auth::User()->name}}</p>
                          <input type="hidden" name="usercode" value="{{Auth::User()->kode_user}}">
                      </div>
                      <div class="col-md-4 col-xs-4" style="text-align: right;">
                        <a href="#"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                          <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a>
                      </div>
                  </div>
                  <div class="panel-body msg_container_base opsi_chat">
                    <div class="col-md-2 col-xs-2 avatar">
                      <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                    </div>
                      <div class="col-md-10 col-xs-10">
                          <div class="messages msg_receive default_chat">
                          {{-- fill in the default chat --}}
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                      <div class="input-group">
                          <input type="text" name="message" id="message" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                          <span class="input-group-btn">
                          <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                          </span>
                      </div>
                  </div>
      		    </div>
          </div>
      </div>
  </div>
