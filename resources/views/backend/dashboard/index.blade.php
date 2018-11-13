@extends('backend.general.master')
@extends('backend.dashboard.component.asset')
@section('content')
<div class="container-fluid">
 @include('backend.dashboard.blockdashboard')
 @include('backend.dashboard.chartsdashboard')
 @include('backend.dashboard.recentdashboard')
</div>
<!-- end row -->
@endsection