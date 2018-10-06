@section('csspersonal')
	{{-- Drop Your Cascading Style Sheet In Here --}}
@endsection
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
	<script type="text/javascript" src="{{ asset('js/user/croppieuser.js') }}"></script>
	<script type="text/javascript" src="{{ asset('backend/assets/plugins/parsleyjs/parsley.min.js') }}"></script>

	<script type="text/javascript">
			$(document).ready(function() {
					$('form').parsley();
			});
	</script>
@endsection
