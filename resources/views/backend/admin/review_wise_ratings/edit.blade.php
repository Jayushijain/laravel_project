@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Edit Form
				</div>
			</div>
			<div class="panel-body">
                <form action="{{ route('rating_wise_quality.update',$quality->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                	{{ method_field('patch') }}
                	{{ csrf_field() }}

                	<div class="form-group">
                		<label for="rating_from" class="col-sm-3 control-label">Rating From</label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="rating_from" id="rating_from" placeholder="Rating From" value="{{ $quality->rating_from }}" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="rating_to" class="col-sm-3 control-label">Rating To</label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="rating_to" id="rating_to" placeholder="Rating To" value="{{ $quality->rating_to }}" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="quality" class="col-sm-3 control-label">Quality</label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="quality" id="quality" placeholder="Quality" value="{{ $quality->quality }}" required>
                		</div>
                	</div>



                	<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                		<button type="submit" class="btn btn-info">Update</button>
                		<button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
                	</div>
                </form>
			</div>
		</div>
	</div><!-- end col-->
</div>


@stop