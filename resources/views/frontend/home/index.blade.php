@extends('frontend.general.master')
@extends('frontend.home.component.asset')
@section('content')
<!-- Slider -->
@include('frontend.home.slider')
<!-- Banner -->
@include('frontend.home.banner')
<!-- Overview-->
@include('frontend.home.overview')
<!-- Modal -->
@include('frontend.home.modal')
@endsection
