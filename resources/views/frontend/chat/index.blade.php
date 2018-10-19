  <div class="container form_chats" style="z-index:100;">
      <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
          <div class="col-xs-12 col-md-12">
          	<div class="panel panel-default">
                  <div class="panel-heading top-bar">
                      <div class="col-md-6 col-xs-6">
                          <p class="panel-title"><i class="glyphicon glyphicon-comment"></i>  Customers</p>
                          <input type="hidden" name="usercode" id="usercode" value=@if (Auth::User() === null) "" @else "{{Auth::User()->kode_user}}" @endif>
                      </div>
                      <div class="col-md-6 col-xs-4" style="text-align: right;left: 0px;">
                        <a href="#" title="Minimize"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                        <a href="#" title="Hidden"><span class="glyphicon glyphicon-remove icon_close"></span></a>
                        <a href="#" title="End chat" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-trash" ></span></a>
                      </div>
                  </div>
                  <div class="panel-body msg_container_base opsi_chat">
                    <div class="col-md-2 col-xs-2 avatar">
                      <img src="http://www.ectricol.com/media/images/customerservice.png" class=" img-responsive ">
                    </div>
                      <div class="col-md-10 col-xs-10">
                          <div class="messages msg_receive default_chat" style="background-color:#BFBFBF;">
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
  @if (Auth::User())
    <div class="btn-group dropup">
      <button type="button" class="btn btn-default btn_chat" title="Live Chats">
        <span class="glyphicon glyphicon-comment"></span>
      </button>
    </div>
  @endif
  {{-- modal end chats --}}
  <div id="myModal" class="modal" tabindex="-1" style="z-index: 100000;" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> End Chatting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>you sure you want to stop this chat ?</p>
          <input type="hidden" name="code_master_chat">
          <input type="hidden" name="code_opsi_chat">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary end_chat">Yes </button>
        </div>
      </div>
    </div>
  </div>
