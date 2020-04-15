<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

<div id="beauty_service_parent_div" style="display: none; padding-top: 10px;">
  <div id = "beauty_service_div">
    <div class="beauty_service_div">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
              <h5 class="card-title mb-0">Beauty Service</h5>
              <div class="collapse show" style="padding-top: 10px;">
                <div class="row no-margin">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="service_name">Service Name</label>
                      <input id="service_name" type="text" name="service_name[]" class="form-control" />
                    </div>

                    <div class="row">
                      <div class="col-12"><label>Service Time</label></div>
                      <div class="form-group  mb-2 col-md-5">
                        <div class="input-group">
                          <input type="time" onchange="service_time()" name="starting_time[]" class="form-control" required>
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2  mb-2 text-center pt-1">To</div>
                      <div class="form-group  mb-2 col-md-5">
                        <div class="input-group">
                          <input type="time" name="ending_time[]" class="form-control" required>
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group  mb-2">
                      <label>Service Duration</label>
                      <div class="input-group">
                        <input type="number" name="duration[]" placeholder="Minute" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="service_price">Service Price {{ '('.currency_code_and_symbol().')' }}</label>
                      <input id="service_price" type="text" name="service_price[]" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="wrapper-image-preview">
                      <div class="box">
                        <div class="js--image-preview"></div>
                        <div class="upload-options">
                          <label for="service-image-1" class="btn"> <i class="entypo-camera"></i> Upload Service Image<small>(200 X 200) </small> </label>
                          <input id="service-image-1" style="visibility:hidden;" type="file" class="image-upload" name="service_image[]" accept="image/*">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendBeautyService()"> <i class="mdi mdi-plus"></i> Add New Beauty Service</button>
  </div>
</div>

<div id = "blank_beauty_service_div">
  <div id = "beauty_service_div">
    <div class="beauty_service_div">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
              <h5 class="card-title mb-0">Beauty Service</h5>
              <div class="collapse show" style="padding-top: 10px;">
                <div class="row no-margin">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="service_name">Service Name</label>
                      <input id="service_name" type="text" name="service_name[]" class="form-control" />
                    </div>

                    <div class="row">
                      <div class="col-12"><label>Service Time</label></div>
                      <div class="form-group  mb-2 col-md-5">
                        <div class="input-group">
                          <input type="time" onchange="service_time()" name="starting_time[]" class="form-control" required>
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2  mb-2 text-center pt-1">To</div>
                      <div class="form-group  mb-2 col-md-5">
                        <div class="input-group">
                          <input type="time" name="ending_time[]" class="form-control" required>
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group  mb-2">
                      <label>Service Duration</label>
                      <div class="input-group">
                        <input type="number" name="duration[]" placeholder="Minute" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="service_price">Service Price {{ '('.currency_code_and_symbol().')' }}</label>
                      <input id="service_price" type="text" name="service_price[]" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="wrapper-image-preview">
                      <div class="box">
                        <div class="js--image-preview"></div>
                        <div class="upload-options">
                          <label for="service-image-1" class="btn"> <i class="entypo-camera"></i> Upload Service Image<small>(200 X 200) </small> </label>
                          <input id="service-image-1" style="visibility:hidden;" type="file" class="image-upload" name="service_image[]" accept="image/*">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
