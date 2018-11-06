
@extends('backend.general.master')
@section('content')
      <div id="frame" class="loadpagechat-backend">
      	<div id="sidepanel">
      		<div id="search">
      			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
      			<input type="text" placeholder="Search contacts..." />
      		</div>
      		<div id="contacts">
      			<ul id="show_list_user" >

      			</ul>
      		</div>
      	</div>
      	<div class="content">
      		<div class="contact-profile">
      			<p style="padding-left:25px;" class="username"></p>
      		</div>
      		<div class="messages">
      			<ul class="show_list_chat">

      			</ul>
      		</div>
      		<div class="message-input">
      			<div class="wrap">
        			<input type="text" id="input_message" name="input_message" class="form-control input-sm chat_input" placeholder="Write your message...">
        			<input type="hidden" name="" id="default_code_chat">
      			</div>
      		</div>
      	</div>
      </div>
@endsection
