@php
  $food_menus = App\FoodMenu::where('listing_id',$listing->id)->get();  
@endphp
<div id="food_menu_parent_div" style="display: none; padding-top: 10px;">
  <div id = "food_menu_div">
    @foreach ($food_menus as $key=>$food_menu)
    <div class="food_menu_div">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
              <h5 class="card-title mb-0">Food Menu
              @if ($key > 0 )
                <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" id = "{{ $food_menu->id }}" onclick="removeFoodMenu(this)">Remove This Food Menu</button>
              @endif
            </h5>
              <div class="collapse show" style="padding-top: 10px;">
                <div class="row no-margin">
                  <div class="col-lg-8">
                    <input type="hidden" name="food_menu_id[]" value="{{ $food_menu->id }}">
                    <div class="form-group">
                      <label for="menu_name">Menu Name</label>
                      <input type="text" name="menu_name[]" class="form-control" value="{{ $food_menu->name }}"/>
                    </div>

                    <div class="form-group">
                      <label for="items">Items <small>(Press Enter After Entering Every Variant)</small></label>
                      <input type="text" class="form-control bootstrap-tag-input" name="items[]" data-role="tagsinput" value="{{ $food_menu->items }}"/>
                    </div>

                    <div class="form-group">
                      <label for="menu_price">Menu Price {{ '('.currency_code_and_symbol().')' }}</label>
                      <input type="text" name="menu_price[]" class="form-control" value="{{ $food_menu->price }}"/>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="wrapper-image-preview">
                      <div class="box">
                        <div class="js--image-preview" style="background-image: url('{{ asset('uploads/restaurant_menu_images/'.$food_menu->photo) }}')"></div>
                        <div class="upload-options">
                          <label for="menu-image-1" class="btn"> <i class="entypo-camera"></i> Upload Menu Image <small>(200 X 200) </small> </label>
                          <input id="menu-image-{{ $food_menu->id }}" style="visibility:hidden;" type="file" class="image-upload" name="menu_image[]" accept="image/*">
                          <input type="hidden" class="" name="old_food_menu_images[]" value="{{ $food_menu->photo }}">
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
    @endforeach
  </div>

  <div class="row text-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendFoodMenu()"> <i class="mdi mdi-plus"></i> Add New Food Menu</button>
  </div>
</div>

<div id = "blank_food_menu_div">
  <div class="food_menu_div">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            <h5 class="card-title mb-0">Food Menu
              <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeFoodMenu(this)">Remove This Food Menu</button>
            </h5>
            <div class="collapse show" style="padding-top: 10px;">
              <div class="row no-margin">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="menu_name">Menu Name</label>
                    <input type="text" name="menu_name[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="items">Items <small>(Press Enter After Entering Every Variant)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="items[]" data-role="tagsinput"/>
                  </div>

                  <div class="form-group">
                    <label for="menu_price">Menu Price {{ '('.currency_code_and_symbol().')' }}</label>
                    <input type="text" name="menu_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="" class="btn"> <i class="entypo-camera"></i>Upload Menu Image <small>(200 X 200) </small> </label>
                        <input id="" style="visibility:hidden;" type="file" class="image-upload" name="menu_image[]" accept="image/*">
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
