@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					{{ $page_info['page_title'] }}
				</div>
			</div>
			<div class="panel-body">

				<form action="{{ route('amenities.update',$amenity->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
					{{ method_field('patch') }}
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Amenity Title</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="Provide Amenity Name" value="{{ $amenity->name }}" required onchange="checkAmenityName(this.value)">
						</div>
					</div>



					<div class="form-group" id = "icon-picker-area">
						<label for="font_awesome_class" class="col-sm-3 control-label">Icon Picker</label>

						<div class="col-sm-7">
							<input type="text" name="icon" class="form-control icon-picker" autocomplete="off" value="{{ $amenity->icon }}" required>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
							<button type="submit" class="btn btn-info">Update Amenity</button>
							<button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>


@stop

@section('scripts')

<script>
 	
function checkAmenityName(amenity_name)
{
	if(/^[a-zA-Z0-9]+\s+[a-zA-Z0-9]*$/.test(amenity_name) == false && 
		/^[a-zA-Z0-9]*$/.test(amenity_name) == false)
	{
		$("#name").parent().parent().addClass("has-error");
		$("#name").parent().append('<span class="help-block">Category name can only contain text and numbers</span>');
		return false;
	}
	else
	{
		$("#name").parent().parent().removeClass("has-error");
		$(".help-block").remove();
		return true;
	}

}

 </script>

@stop