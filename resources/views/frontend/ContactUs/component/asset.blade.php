@section('csspersonal')

@endsection
@section('jspersonal')
<script>
$(document).ready(function() {
	setTimeout(function() {
		$(document).find('.alert').fadeOut('slow');
	},3000);
});
</script>
@endsection