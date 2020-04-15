<div class="form-group">
  <label class="col-sm-3 control-label" for="tags">Tags</label>
  <div class="col-sm-7">
    <div class="form-group">
      <input type="text" class="form-control bootstrap-tag-input" id = "tags" name="tags" data-role="tagsinput" style="width: 100%;" value="{{ $listing->tags }}" />
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="SEO_meta_tags">SEO Meta Tags</label>
  <div class="col-sm-7">
    <div class="form-group">
      <input type="text" class="form-control" id = "seo_meta_tags" name="seo_meta_tags" data-role="tagsinput" style="width: 100%;" value="{{ $listing->seo_meta_tags }}" />
    </div>
  </div>
</div>
