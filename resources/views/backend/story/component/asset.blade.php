@section('csspersonal')
<link href="{{ asset('backend/assets/plugins/summernote/summernote.css') }}" rel="stylesheet" />
	{{-- Drop Your Cascading Style Sheet In Here --}}
@endsection
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
	<script type="text/javascript" src="{{ asset('js/story/indexstory.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/summernote/summernote.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/story/croppiestory.js') }}"></script>
@endsection
