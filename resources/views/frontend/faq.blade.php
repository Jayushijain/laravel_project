@extends('layouts.frontend_home_layout') 

@section('content') 
@include('frontend.header')

<div class="sub_header_in sticky_header">
  <div class="container">
    <h1>
    FAQ<?php //echo $title; ?>
    </h1>
  </div>
  <!-- /container -->
</div>
<!-- /sub_header -->

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div id="confirm">
				<div class="icon icon--order-success svg add_bottom_15">
					<!-- <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
						<g fill="none" stroke="#8EC343" stroke-width="2">
							<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
							<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
						</g>
					</svg> -->
					<img src="css/images/faq.svg" alt="" style="height: 72px; width: 72px;">
				</div>
				<h2><?php echo 'FAQ'; ?></h2>
				<!-- <p>Lorem Ipsum Dolor Emmet</p> -->
			</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<div class="bg_color_1">
	<div class="container margin_60_35">
		<div class="row">
			<p>
				<?php //echo get_frontend_settings('faq'); ?>
			</p>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection