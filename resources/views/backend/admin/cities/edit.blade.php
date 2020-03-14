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

				<form action="{{ route('cities.update',$city->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
					{{ method_field('patch') }}
					{{ csrf_field() }}

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">City Name</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="City Name" required value="{{ $city->name }}" onchange="checkName(this.value)">
						</div>
					</div>

					<div class="form-group">
						<label for="country_id" class="col-sm-3 control-label">Country</label>

						<div class="col-sm-7">
							<select name="country_id" id = "country_id" class="select2" data-allow-clear="true" required data-placeholder="Select Country" >
								<option value="">None</option>
								@foreach ($countries as $country)
									<option value="{{ $country->id }}"
										@if ( $city->country_id == $country->id)
											{{ 'selected' }}
										@endif>
										{{ $country->name }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
						<button type="submit" class="btn btn-info">Update City</button>
						<button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>


@stop

@section('scripts')


@stop