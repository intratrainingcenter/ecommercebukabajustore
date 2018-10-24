@section('csspersonal')
	<!-- CSS REVIEW -->
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('backend/assets/css/styleforrating.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('jspersonal')
	<script type="text/javascript" src="{{ asset('js/frontend/mypurchase/indexhistory.js') }}"></script>
	<!-- JS REVIEW -->
	<script src="{{ asset('backend/assets/plugins/bootstrap-rating/bootstrap-rating.min.js') }}"></script>
	<script src="{{ asset('backend/assets/pages/rating-init.js') }}"></script>
	<script src="{{ asset('js/frontend/review/review.js') }}"></script>
@endsection
