
  @if (auth::user() != null)
  <div class="" id="box-chat">
    <a href="#" title="Live Chats" class="start_chat"><i class="fa fa-comments" style="color:white;"></i></a>
  </div>
@endif
	<div id="live-chat">
		<header class="clearfix">
		    <a href="#" class="chat-close end_chat" title="End Chat" data-toggle="modal" data-target="#modal_endchat"><i class="fa fa-trash"></i></a>
      @if (Auth::User() != null)
        <input type="hidden" name="" id="usercode" value="{{ Auth::User()->kode_user }}">
      @endif
			<h4>Buka Baju Store</h4>
		</header>
		<div class="chat">
			<div class="chat-history opsi_chat">
          {{-- <p style="text-align:left;">Customer</p>
			    <div class="chat-message clearfix chat-box">
					<div class="chat-message-content clearfix default_chat"> --}}
                {{-- fill in default chat --}}
					{{-- </div> <!-- end chat-message-content --> --}}
				{{-- </div> <!-- end chat-message --> --}}
			</div> <!-- end chat-history -->
			<form id="form_send_message" >
				<fieldset>
					<input type="text" name="message" id="message" placeholder="Type your message…" value="" autocomplete="off" autofocus >
				</fieldset>
			</form>
		</div> <!-- end chat -->
	</div> <!-- end live-chat -->

  <div class="modal fade" id="modal_endchat" role="dialog" tabindex="-1" style="z-index:100000;">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Are tou sure end the chats?.</p>
          <input type="hidden" name="code_master_chat">
          <input type="hidden" name="code_opsi_chat">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left cancelEndChat" data-dismiss="modal" >Cancel</button>
          <button type="button" class="btn btn-primary pull-right" id="endchatting">Yes</button>
        </div>
      </div>
  </div>
</div>
