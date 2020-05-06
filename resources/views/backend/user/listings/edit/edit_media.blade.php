<div class="form-group">
  <label class="col-sm-3 control-label">Listing Thumbnail <br/> <small>(460 X 306)</small> </label>
  <div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
        @if ($listing->listing_thumbnail)
        <img src="{{ asset('uploads/listing_thumbnails/'.$listing->listing_thumbnail) }}" style="width: 200px; height: 200px;">
        @else
        <img src="{{ asset('uploads/placeholder.png') }}">
        @endif
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
        @if ($listing->listing_cover)
        <img src="{{ asset('uploads/listing_cover_photo/'.$listing->listing_cover) }}" style="width: 200px; height: 200px;">
        @else
        <img src="{{ asset('uploads/placeholder.png') }}">
        @endif
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
      <option value="youtube" @if($listing->video_provider == "youtube") {{ 'selected' }} @endif>YouTube</option>
      <option value="vimeo" @if($listing->video_provider == "vimeo") {{ 'selected' }} @endif>Vimeo</option>
      <option value="html5" @if($listing->video_provider == "html5") {{ 'selected' }} @endif>HTML5</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label for="video_url" class="col-sm-3 control-label">Video Url</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="video_url" id="video_url" placeholder="Video Url" required value="{{ $listing->video_url }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="listing_images">Listing Gallery Images<br/> <small>(960 X 640)</small> </label>
  <div class="col-sm-7">
    <div id="photos_area">
      @if (count(json_decode($listing->photos)) > 0 )
        @foreach (json_decode($listing->photos) as $key=>$photo)
        @if ($key == 0)
        <div class="row">
          <div class="col-sm-7">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                    <img src="{{ asset('uploads/listing_images/'.$photo) }}" alt="..." style="width: 200px; height: 200px;">
                    <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="{{ $photo }}">
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
        @else
        <div class="row appendedPhotoUploader">
          <div class="col-sm-7">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                    <img src="{{ asset('uploads/listing_images/'.$photo) }}" alt="..." style="width: 200px; height: 200px;">
                    <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="{{ $photo }}">
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
        @endif
        @endforeach
        @else
        <div class="row">
          <div class="col-sm-7">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                    <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
                    <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="">
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
      @endif
    </div>

    <div id="blank_photo_uploader">
      <div class="row appendedPhotoUploader">
        <div class="col-sm-7">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                  <img src="{{ asset('uploads/placeholder.png') }}" alt="...">
                  <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new">select Image</span>
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
