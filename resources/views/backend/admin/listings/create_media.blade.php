<div class="form-group">
  <label class="col-sm-3 control-label">Listing Thumbnail <br/> <small>(460 X 306)</small> </label>
  <div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
        <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
      <div>
        <span class="btn btn-white btn-file">
          <span class="fileinput-new">Select Image</span>
          <span class="fileinput-exists">Change</span>
          <input type="file" name="listing_thumbnail" accept="image/*">
        </span>
        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label">Listing Cover <br/> <small>(1600 X 600)</small> </label>
  <div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
        <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
      <div>
        <span class="btn btn-white btn-file">
          <span class="fileinput-new">Select Image</span>
          <span class="fileinput-exists">Change</span>
          <input type="file" name="listing_cover" accept="image/*">
        </span>
        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label for="video_provider" class="col-sm-3 control-label">Video Provider</label>
  <div class="col-sm-7">
    <select name="video_provider" id = "video_provider" class="selectboxit" required>
      <option value="youtube">YouTube</option>
      <option value="vimeo">Vimeo</option>
      <option value="html5">HTML5</option>
		</select>
  </div>
</div>

<div class="form-group">
  <label for="video_url" class="col-sm-3 control-label">Video Url</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Video Url" required>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="listing_images">Listing Gallery Images<br/> <small>(960 X 640)</small> </label>
  <div class="col-sm-7">
    <div id="photos_area">
      <div class="row">
        <div class="col-sm-7">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                  <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new">Select Image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="listing_images[]" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
        </div>
      </div>
    </div>
    <div id="blank_photo_uploader">
      <div class="row appendedPhotoUploader">
        <div class="col-sm-7">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                  <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new">Select Image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="listing_images[]" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
        </div>
      </div>
    </div>
  </div>
</div>
