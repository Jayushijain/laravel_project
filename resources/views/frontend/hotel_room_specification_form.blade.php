<div id="hotel_room_specification_parent_div" style="display: none;">
  <div id = "hotel_room_specification_div">
    <div class="hotel_room_specification_div">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title mb-0">Hotel room specification</h5>
            <div class="collapse pt-3 show">
              <div class="row">
                <div class="col-xl-8">
                  <div class="form-group">
                    <label for="room_name">Room name</label>
                    <input type="text" name="room_name[]" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="room_description">Room description</label>
                    <textarea name="room_description[]" class="form-control" rows="5"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="room_price">Room price</label>
                    <input type="text" name="room_price[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="hotel_room_amenities">Hotel room amenities<small>(Press_Enter_after_entering_every_amenity)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="hotel_room_amenities[]" data-role="tagsinput"/>
                  </div>
                </div>
                <div class="col-xl-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="room-image-1" class="btn"> <i class="mdi mdi-camera"></i>Upload room image</label>
                        <input id="room-image-1" style="visibility:hidden;" type="file" class="image-upload" name="room_image[]" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- end card-->
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendHotelRoomSpecification()"> <i class="mdi mdi-plus"></i>Add New</button>
  </div>
</div>


<div id = "blank_hotel_room_specification_div">
  <div class="hotel_room_specification_div">
    <div class="col-xl-12">
      <!-- Portlet card -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-0">Hotel room specification
            <button type="button" class="btn btn-outline-danger btn-sm btn-rounded alignToTitle" name="button" onclick="removeHotelRoomSpecification(this)">Remove</button>
          </h5>
          <div class="collapse pt-3 show">
            <div class="row">
              <div class="col-xl-8">
                <div class="form-group">
                  <label for="room_name">Room Name</label>
                  <input type="text" name="room_name[]" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="room_description">Room description</label>
                  <textarea name="room_description[]" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                  <label for="room_price">Room price</label>
                  <input type="text" name="room_price[]" class="form-control" />
                </div>

                <div class="form-group">
                  <label for="amenities">Amenities<small>(Press Enter after entering every amenity)</small></label>
                  <input type="text" class="form-control bootstrap-tag-input" name="hotel_room_amenities[]" data-role="tagsinput"/>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="wrapper-image-preview">
                  <div class="box">
                    <div class="js--image-preview"></div>
                    <div class="upload-options">
                      <label for="room-image-1" class="btn"> <i class="mdi mdi-camera"></i>Upload room image</label>
                      <input id="room-image-1" style="visibility:hidden;" type="file" class="image-upload" name="room_image[]" accept="image/*">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end card-->
    </div>
  </div>
</div>
