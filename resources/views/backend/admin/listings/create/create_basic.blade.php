

<div class="form-group">
  <label for="title" class="col-sm-3 control-label">Title</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-sm-3 control-label">Description</label>
  <div class="col-sm-7">
    <textarea name="description" class="form-control" id="description" rows="8" cols="80"></textarea>
  </div>
</div>
<div class="form-group">
  <label for="featured_type" class="col-sm-3 control-label">Featured Type</label>
  <div class="col-sm-7">
    <select name="is_featured" id = "featured_type" class="selectboxit" required>
      <option value="">Select Featured Type</option>
      <option value="1">Featured</option>
      <option value="0">None Featured</option>
		</select>
  </div>
</div>
<div class="form-group">
  <label for="google_analytics_id" class="col-sm-3 control-label">Google Analytics Id</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="google_analytics_id" id="google_analytics_id"  placeholder="GA_MEASUREMENT_ID">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="category"> Category</label>
  <div class="col-sm-7">
    <div id="category_area">
      <div class="row">
        <div class="col-sm-7">
          <select class="form-control selectboxit" name="categories[]" id = "category_default" required>
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
        </div>
      </div>
    </div>

    <div id="blank_category_field">
      <div class="row appendedCategoryFields" style="margin-top: 10px;">
        <div class="col-sm-7 pr-0">
          <select class="form-control" name="categories[]">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
        </div>
      </div>
    </div>
  </div>
</div>

