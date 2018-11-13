@section('csspersonal')
	{{-- Drop Your Cascading Style Sheet In Here --}}
	<link href="{{asset('backend/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
@endsection
@section('jspersonal')
	{{-- Drop Your Javascript In Here --}}
	<script src="{{asset('backend/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('js/reportproduct/indexreportproduct.js')}}"></script>
@endsection
