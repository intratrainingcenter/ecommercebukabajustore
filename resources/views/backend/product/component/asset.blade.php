@section('csspersonal')
{{-- Drop Your Cascading Style Sheet In Here --}}
<link href="{{ asset('backend/assets/plugins/summernote/summernote.css') }}" rel="stylesheet" />
@endsection
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
	<script type="text/javascript" src="{{ asset('js/product/product.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/product/croppieproduct.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/summernote/summernote.min.js') }}"></script>
@endsection
