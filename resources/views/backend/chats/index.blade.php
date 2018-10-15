
@extends('backend.general.master')
@section('csspersonal')
    {{-- Drop Your Cascading Style Sheet In Here --}}
    <link rel="apple-touch-icon" href="{{asset('backendapp-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/app-assets/images/ico/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/app.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/fonts/simple-line-icons/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/pages/chat-application.css')}}">
    <!-- END Page Level CSS-->
@section('jspersonal')
    {{-- Drop Your Javascript In Here --}}
     <script src="{{asset('backend/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/js/core/app-menu.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/js/core/app.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/js/scripts/customizer.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/app-assets/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">

						<div class="app-content content">
						  <div class="sidebar-left sidebar-fixed">
						    <div class="sidebar">
						      <div class="sidebar-content card d-none d-lg-block">
						        <div class="card-body chat-fixed-search">
						            <fieldset class="form-group position-relative has-icon-left m-0">
						                <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
						                <div class="form-control-position">
						                    <i class="ft-search"></i>
						                </div>
						            </fieldset>     
						        </div>
						         <div id="users-list" class="list-group position-relative">
							        <div class="users-list-padding media-list">
							            <a href="#" class="media border-0">
							                <div class="media-left pr-1">
							                    <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('backend/app-assets/images/portrait/small/avatar-s-3.png')}}" alt="Generic placeholder image">
							                    <i></i>
							                    </span>
							                </div>
							                <div class="media-body w-100">
							                    <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-3 float-right primary">4:14 AM</span></h6>
							                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Okay <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
							                </div>
							            </a>
							            <a href="#" class="media border-0">
							                <div class="media-left pr-1">
							                    <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{asset('backend/app-assets/images/portrait/small/avatar-s-7.png')}}" alt="Generic placeholder image">
							                    <i></i>
							                    </span>
							                </div>
							                <div class="media-body w-100">
							                    <h6 class="list-group-item-heading">Kristopher Candy <span class="font-small-3 float-right primary">9:04 PM</span></h6>
							                    <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Thank you <span class="float-right primary"><span class="badge badge-pill badge-primary">12</span></span></p>
							                </div>
							            </a>
							        </div>
							    </div>
							    	<div class="content-right">
									    <div class="content-wrapper">
									      <div class="content-header row">
									      </div>
									      <div class="content-body">
									        <section class="chat-app-window">
									            <div class="badge badge-default mb-1">Chat History</div>
									            <div class="chats">
									                <div class="chats">
									                  <div class="chat">
									                    <div class="chat-avatar">
									                      <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
									                          <img src="{{asset('backend/app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar" />
									                      </a>
									                    </div>
									                    <div class="chat-body">
									                      <div class="chat-content">
									                        <p>How can we help? We're here for you!</p>
									                      </div>
									                    </div>
									                  </div>
									                  <div class="chat chat-left">
									                    <div class="chat-avatar">
									                      <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
									                        <img src="{{asset('backend/app-assets/images/portrait/small/avatar-s-7.png')}}" alt="avatar" />
									                      </a>
									                    </div>
									                    <div class="chat-body">
									                      <div class="chat-content">
									                        <p>Hey John,  I am looking for the best admin template.</p>
									                        <p>Could you please help me to find it out?</p>
									                      </div>
									                      <div class="chat-content">
									                        <p>It should be Bootstrap 4 compatible.</p>
									                      </div>
									                    </div>
									                  </div>
									                </div>
									            </div>
									        </section>
									    </div>
									</div>
									</div>
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