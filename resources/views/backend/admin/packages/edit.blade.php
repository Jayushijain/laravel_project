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

				<form action="{{ route('packages.update',$package->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
					{{ method_field('patch') }}
					{{ csrf_field() }}

					<div class="form-group">
						<label for="package_type" class="col-sm-3 control-label">Package Type</label>

						<div class="col-sm-7">
							<select name="package_type" id = "package_type" class="select2" data-allow-clear="true" data-placeholder="Package Type" required>
								<option value="">Select Type</option>
								<option value="0" id="free"
								@if ($package->package_type == 0)
									{{ 'selected' }}
								@endif>Free</option>
								<option value="1" id="paid"
								@if ($package->package_type == 1)
									{{ 'selected' }}
								@endif>Paid</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Package Name</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="Package Name" value="{{ $package->name }}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Price({{ currency_code_and_symbol() }})</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="{{ $package->price }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for = "validity">Validity In Days</label>

						<div class="col-sm-7">
							<div class="input-group">
								<input type="number" class="form-control" name="validity" id="validity" placeholder="Validity In Days" aria-describedby="days-addon" min="1" value="{{ $package->validity }}" required>
								<span class="input-group-addon" id="days-addon">Days</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_listings" class="col-sm-3 control-label">Number Of Listings</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_listings" id="number_of_listings" placeholder="Number Of Listings" value="{{ $package->number_of_listings }}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_categories" class="col-sm-3 control-label">Number Of Categories</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_categories" id="number_of_categories" placeholder="Number Of Categories" value="{{ $package->number_of_categories }}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_tags" class="col-sm-3 control-label">Number Of Tags</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_tags" id="number_of_tags" placeholder="Number Of Tags" value="{{ $package->number_of_tags }}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_photos" class="col-sm-3 control-label">Number Of Photos</label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_photos" id="number_of_photos" placeholder="Number Of Photos" value="{{ $package->number_of_photos }}" required>
						</div>
					</div>

					<div class="form-group">
						<label for="ability_to_add_video" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_video" value="1" name = "ability_to_add_video" 
							@if ($package->ability_to_add_video == 1)
								{{ 'checked' }}
							@endif>
			        <label for="ability_to_add_video">Ability To Add Video</label>
						</div>
					</div>

					<div class="form-group">
						<label for="ability_to_add_contact_form" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_contact_form" value="1" name = "ability_to_add_contact_form"
							@if ($package->ability_to_add_contact_form == 1)
								{{ 'checked' }}
							@endif>
			        <label for="ability_to_add_contact_form">Ability To Add Contact Form</label>
						</div>
					</div>

					<div class="form-group">
						<label for="is_recommended" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="is_recommended" value="1" name = "is_recommended"
							@if ($package->is_recommended == 1)
								{{ 'checked' }}
							@endif>
			        <label for="is_recommended">Mark This Package As Recommended</label>
						</div>
					</div>

					<div class="form-group">
						<label for="featured" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="featured" value="1" name = "featured"
							@if ($package->featured == 1)
								{{ 'checked' }}
							@endif>
			        <label for="featured">Featured</label>
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

@section('scripts')

<script type="text/javascript">

$(document).ready(function(){
	$("#package_type").change(function(){
		var amount = $('#package_type').val();
		if(amount == 0){
			$('#price').val(0);
			$('#price').prop('readonly', true);
		}else{
			$('#price').val();
			$('#price').prop('readonly', false);
		}
	});
});
</script>

@stop