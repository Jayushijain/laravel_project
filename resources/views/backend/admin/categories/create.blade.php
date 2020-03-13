@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Category Add form
				</div>
			</div>
			<div class="panel-body">

				<form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

					{{ csrf_field() }}

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Category Title:</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="Provide Category Name" required onchange="checkCategoryName(this.value)">
						</div>
					</div>

					<div class="form-group">
						<label for="parent" class="col-sm-3 control-label">Parent Category</label>

						<div class="col-sm-7">
							<select name="parent_id" id = "parent" class="select2" data-allow-clear="true" data-placeholder="Select Parent Category" onchange="checkCategoryType(this.value)">
								<option value="0">None</option>
								@foreach ($categories as $category)
									@if ($category->parent_id == 0)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group" id = "icon-picker-area">
						<label for="font_awesome_class" class="col-sm-3 control-label">Icon Picker</label>

						<div class="col-sm-7">
							<input type="text" name="icon_class" class="form-control icon-picker" autocomplete="off" required>
						</div>
					</div>

					<div class="form-group" id = "thumbnail-picker-area">
						<label class="col-sm-3 control-label">Category Thumbnail <small>(400 X 255)</small> </label>

						<div class="col-sm-7">

							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
									<img src="{{ asset('uploads/category_thumbnails/thumbnail.png') }}" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select Image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="thumbnail" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
							<button type="submit" class="btn btn-info">Add Category</button>
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
function checkCategoryType(category_type) {
	if (category_type > 0) {
		$('#thumbnail-picker-area').hide();
	}else {
		$('#thumbnail-picker-area').show();
	}
}

function checkCategoryName(category_name)
{
	if(/^[a-zA-Z0-9]+\s+[a-zA-Z0-9]*$/.test(category_name) == false && 
		/^[a-zA-Z0-9]*$/.test(category_name) == false)
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