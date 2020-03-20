@extends('layouts.frontend_home_layout') 

@section('content') 

@include('frontend.header_listing')

@if (Session::has('listings_view'))
    @include('frontend.listings_list_view')
@else  
    @include('frontend.listings_grid_view')
@endif

<!-- Main page -->
<main>

</main>
<!-- Site footer -->


@endsection
