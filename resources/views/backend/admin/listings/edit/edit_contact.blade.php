@php
  $links = json_decode($listing->social,true);
@endphp
<div class="form-group">
  <label class="col-sm-3 control-label" for="website">Website</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="website" name="website" placeholder="Website" value="{{ $listing->website }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="email">Email</label>
  <div class="col-sm-7">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $listing->email }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="phone_number">Phone Number</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="phone_number" name="phone" placeholder="Phone Number" value="{{ $listing->phone }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="facebook">Facebook</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="facebook" placeholder="www.facebook.com/xyz/" value="{{ $links['facebook'] }}">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="twitter">Twitter</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/xyz/" value="{{ $links['twitter'] }}">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="linkedin">Linkedin</label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="linkedin" placeholder="www.linkedin.com/xyz/" value="{{ $links['linkedin'] }}">
  </div>
</div>
