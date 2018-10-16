
@extends('backend.general.master')

@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="card m-b-20">
                  <div class="card-body">
                      <div id="frame">
                      	<div id="sidepanel">
                      		<div id="profile">
                      		</div>
                      		<div id="search">
                      			<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                      			<input type="text" placeholder="Search contacts..." />
                      		</div>
                      		<div id="contacts">
                      			<ul id="show_list_user">

                      			</ul>
                      		</div>
                      	</div>
                      	<div class="content">
                      		<div class="contact-profile">
                      			<p style="padding-left:25px;">History</p>
                      		</div>
                      		<div class="messages">
                      			<ul class="show_list_chat">

                      			</ul>
                      		</div>
                      		<div class="message-input">
                      			<div class="wrap">
                      			<input type="text" id="input_message" placeholder="Write your message...">
                      			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                      			<button class="submit" id="btn_send_message"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                      			</div>
                      		</div>
                      	</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
