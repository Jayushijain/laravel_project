@extends('layouts.backend_layout')

@section('content')

<div class="row ">
  <div class="col-lg-12">
    <a href="{{ route('categories.create') }}" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New Category</a>
  </div><!-- end col-->
</div>
<div class="gallery-env">
  <div class="row">
    @foreach ($categories as $category)
      @if($category->parent_id > 0)
      	@continue
      	@endif
      	@php
      		$sub_categories = App\Category::where('parent_id',$category->id)->get(); 
      	@endphp
       
       @if($category->parent_id == 0) 
      <div class="col-sm-4 on-hover-action" id = "{{ $category->id }}">
        <article class="album">
          <header>
            <a href="extra-gallery-single.html">
              <img src="{{ asset('/uploads/category_thumbnails/'.$category->thumbnail) }}" />
            </a>
          </header>

          <section class="album-info">
            <h3><a href="javascript::"><i class="{{ $category->icon_class }}"></i> {{ ucwords($category->name) }}</a></h3>
            <p>{{ count($sub_categories).' Sub Categories' }}</p>
          </section>

          @foreach ($sub_categories as $sub_category)
            <footer class="on-hover-action" id = "{{ $sub_category->id }}">
              <div class="album-images-count">
                <i class="{{ $sub_category->icon_class }}"></i> {{ ucwords($sub_category->name) }}
              </div>

              <div class="album-options" id = "subcategory-action-btn-{{ $sub_category->id }}" style="display: none;">
                <a href="{{ route('categories.edit',$sub_category->id) }}">
                  <i class="entypo-cog"></i>
                </a>

                <a href="#" onclick="confirm_modal('{{ 'categories' }}','{{ $sub_category->id }}');">
                  <i class="entypo-trash"></i>
                </a>
              </div>
            </footer>
          @endforeach
          <div class="category-actions">
            <a href = "{{ route('categories.edit',$category->id) }}" class="btn btn-info" id = "category-edit-btn-{{ $category->id  }}" style="display: none; margin-right:5px;">
  						Edit
  					</a> 
            <a href = "javascript::" class="btn btn-red" id = "category-delete-btn-{{ $category->id  }}" onclick="confirm_modal('{{ 'categories' }}','{{ $category->id }}');" style="margin-right:5px; float: right; display: none;">
  						Delete
  					</a>
          </div>
        </article>
      </div>
      @endif
    @endforeach
  </div>
</div>

@stop

@section('scripts')

<script type="text/javascript">
$('.on-hover-action').mouseenter(function() {
  var id = this.id;
  $('#category-delete-btn-'+id).show();
  $('#category-edit-btn-'+id).show();
  $('#subcategory-action-btn-'+id).show();
});
$('.on-hover-action').mouseleave(function() {
  var id = this.id;
  $('#category-delete-btn-'+id).hide();
  $('#category-edit-btn-'+id).hide();
  $('#subcategory-action-btn-'+id).hide();
});
</script>

@stop