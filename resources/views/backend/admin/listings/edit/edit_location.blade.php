<div class="form-group">
  <label for="country_id" class="col-sm-3 control-label">Country</label>

  <div class="col-sm-7">
    <select name="country_id" id = "country_id" class="selectboxit" data-allow-clear="true" data-placeholder="Select Country" onchange="getCityList(this.value)">
      <option value="0">None</option>
      @foreach ($countries as $country)
        <option value="{{ $country->id }}" @if ($country->id == $listing->country_id) {{ 'selected' }} @endif>{{ $country->name }}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="city_id"> City</label>
  <div class="col-sm-7">
    <select class="form-control" name="city_id" id="city_id">
      <option value="">Select City</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="address">Address</label>
  <div class="col-sm-7">
    <textarea name="address" rows="5" class="form-control" id = "address">{{ $listing->address }}</textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="latitude">Latitude</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="You Can Provide Latitude For Getting The Exact Result" value="{{ $listing->latitude }}">
  </div>
</div>

<div class="form-group row mb-3">
  <label class="col-sm-3 control-label" for="longitude">Longitude</label>
  <div class="col-md-7">
    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="You Can Provide Longitude For Getting The Exact Result" value="{{ $listing->longitude }}">
  </div>
</div>
