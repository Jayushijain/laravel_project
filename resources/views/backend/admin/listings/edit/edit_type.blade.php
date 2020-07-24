<div class="row">
  <div class="col-sm-offset-3 col-sm-3">
    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="general" name="listing_type" class="custom-control-input listing-type-radio" value="general" onclick="showListingTypeForm('general')" @if ($listing->listing_type == 'general') {{ 'checked'}} @endif>
        <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> General</label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="hotel" name="listing_type" class="custom-control-input listing-type-radio" value="hotel" onclick="showListingTypeForm('hotel')" @if ($listing->listing_type == 'hotel') {{ 'checked'}} @endif>
        <label class="custom-control-label" for="hotel" ><i class="fa fa-hotel" style="color: #636363;"></i> Hotel </label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="restaurant" name="listing_type" class="custom-control-input listing-type-radio" value="restaurant" onclick="showListingTypeForm('restaurant')" @if ($listing->listing_type == 'restaurant') checked = "checked" @endif>
        <label class="custom-control-label" for="restaurant" ><i class="fa fa-hotel" style="color: #636363;"></i> Restaurant</label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="shop" name="listing_type" class="custom-control-input listing-type-radio" value="shop" onclick="showListingTypeForm('shop')" @if ($listing->listing_type == 'shop') {{ 'checked'}} @endif>
        <label class="custom-control-label" for="shop" ><i class="fa fa-hotel" style="color: #636363;"></i> Shop</label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="beauty" name="listing_type" class="custom-control-input listing-type-radio" value="beauty" onclick="showListingTypeForm('beauty')" @if ($listing->listing_type == 'beauty') {{ 'checked'}} @endif>
        <label class="custom-control-label" for="beauty" ><i class="fa fa-hotel" style="color: #636363;"></i> Beauty</label>
      </div>
    </div>
  </div>

  <div class="col-sm-3 text-left">
    <a href="#" id = "demo-btn" class="btn btn-primary mt-4" onclick="showListingTypeWiseDemo($('.listing-type-radio').val())"> <i class="mdi mdi-eye"></i> No Preview Available </a>
  </div>
</div>

@include('backend.admin.listings.edit.special_offer_form'){{-- For shop special offers --}}
@include('backend.admin.listings.edit.restaurant_food_menu_form')
@include('backend.admin.listings.edit.beauty_service_form')
@include('backend.admin.listings.edit.hotel_room_specification_form')
