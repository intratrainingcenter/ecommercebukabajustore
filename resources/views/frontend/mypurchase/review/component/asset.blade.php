@section('csspersonal')
        <!-- Bootstrap rating css -->
        <link href="{{ asset('backend/assets/plugins/bootstrap-rating/bootstrap-rating.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('jspersonal')
			<script src="{{ asset('backend/assets/plugins/bootstrap-rating/bootstrap-rating.min.js') }}"></script>
      <script src="{{ asset('backend/assets/pages/rating-init.js') }}"></script>
      <script src="{{ asset('js/frontend/review/review.js') }}"></script>
@endsection
