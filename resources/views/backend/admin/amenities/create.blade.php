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

				<form action="{{ route('amenities.store') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Amenity Title</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="Provide Amenity Name" required onchange="checkName(this.value)">
						</div>
					</div>



					<div class="form-group" id = "icon-picker-area">
						<label for="font_awesome_class" class="col-sm-3 control-label">Icon Picker</label>

						<div class="col-sm-7">
							<input type="text" name="icon" class="form-control icon-picker" autocomplete="off" required>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
							<button type="submit" class="btn btn-info">Add Amenity</button>
							<button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>


@stop

