@extends('layouts.backend_layout')

@section('content')

<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					Update Category
				</div>
			</div>
			<div class="panel-body">
				

				<form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

					{{ method_field('PATCH') }}

					{{ csrf_field() }}

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Category Title:</label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="Provide Category Name" value="{{ $category->name }}" required onchange="checkCategoryName(this.value)">
						</div>
					</div>

					<div class="form-group">
						<label for="parent" class="col-sm-3 control-label">Parent Category</label>

						<div class="col-sm-7">
							<select name="parent_id" id = "parent" class="select2" data-allow-clear="true" data-placeholder="Select Parent Category" onchange="checkCategoryType(this.value)">
								<option value="0">None</option>
								@foreach ($categories as $p_category)
									@if ($p_category->parent_id == 0 && $p_category->id != $category->id)
										<option value="{{ $p_category->id }}"
											@if ( $p_category->id == $category->parent_id )
												{{ 'selected' }}
											@endif
											>{{ $p_category->name }}</option>
									@endif
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group" id = "icon-picker-area">
						<label for="font_awesome_class" class="col-sm-3 control-label">Icon Picker</label>

						<div class="col-sm-7">
							<input type="text" name="icon_class" class="form-control icon-picker" autocomplete="off" value="{{ $category->icon_class }}" required >
						</div>
					</div>

					@if ( $category->thumbnail != "" )
					<div class="form-group" id = "thumbnail-picker-area">
						<label class="col-sm-3 control-label">Category Thumbnail <small>(400 X 255)</small> </label>

						<div class="col-sm-7">

							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">

									@if ( $category->thumbnail != "")
										<img src="{{ asset('/uploads/category_thumbnails/'.$category->thumbnail) }}" style="width: 200px; height: 200px;" alt="...">
									@else
										<img src="{{ asset('uploads/category_thumbnails/thumbnail.png') }}" alt="...">
									@endif
									
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
					@endif

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
							<button type="submit" class="btn btn-info">Update Category</button>
							<button type="button" class="btn btn-secondary" onclick ="javascript:window.history.back();">Cancel</button>
					</div>
				{!! Form::close() !!}
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