@section('csspersonal')
	{{-- Drop Your Cascading Style Sheet In Here --}}
	<link href="{{ asset('backend/assets/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@endsection
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
	<script src="{{ asset('backend/assets/plugins/summernote/summernote.min.js') }}"></script>
	<script src="{{ asset('js/ordertransaction/validation.js') }}"></script>
@endsection
