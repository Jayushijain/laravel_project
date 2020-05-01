@php
  $products = App\ProductDetail::where('listing_id',$listing->id)->get();  
@endphp
<div id = "special_offer_parent_div" style="display: none; padding-top: 10px;">
  <div id = "special_offer_div">
    @foreach ($products as $key=>$product)
    <div class="special_offer_div">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
              <h5 class="card-title mb-0">Special Offers
              @if ($key > 0 )
                <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" id = "{{ $product->id }}" onclick="removeSpecialOffer(this)">Remove This Product</button>
              @endif</h5>
              <div class="collapse show" style="padding-top: 10px;">
                <div class="row no-margin">
                  <div class="col-lg-8">
                      <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                    <div class="form-group">
                      <label for="product_name">Product Name</label>
                      <input type="text" name="product_name[]" class="form-control" value="{{ $product->name }}"/>
                    </div>

                    <div class="form-group">
                      <label for="variants">Variants <small>(Press Enter After Entering Every Variant)</small></label>
                      <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput" value="{{ $product->variant }}"/>
                    </div>

                    <div class="form-group">
                      <label for="product_price">Product Price {{ '('.currency_code_and_symbol().')' }} </label>
                      <input type="text" name="product_price[]" class="form-control" value="{{ $product->price }}"/>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="wrapper-image-preview">
                      <div class="box">
                        <div class="js--image-preview" style="background-image: url('{{ asset('uploads/product_images/'.$product->photo) }}')"></div>
                        <div class="upload-options">
                          <label for="product-image-1" class="btn"> <i class="entypo-camera"></i> Upload Product Image <small>(200 X 200) </small> </label>
                          <input id="product-image-{{ $product->id }}" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" onchange="console.log(this.value);" accept="image/*">
                          <input type="hidden" name="old_product_images[]" value="{{ $product->photo }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col-->
      </div>
    </div>
    @endforeach
  </div>
  <div class="row text-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendSpecialOffer()"> <i class="entypo-plus"></i> Add New Product</button>
  </div>
</div>

<div id = "blank_special_offer_div">
  <div class="special_offer_div">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            <h5 class="card-title mb-0">Special Offers
              <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeSpecialOffer(this)">Remove This Product</button>
            </h5>
            <div class="collapse show" style="padding-top: 10px;">
              <div class="row no-margin">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" name="product_name[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="variants">Variants <small>(Press Enter After Entering Every Variant)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput"/>
                  </div>

                  <div class="form-group">
                    <label for="product_price">Product Price {{ '('.currency_code_and_symbol().')' }}</label>
                    <input type="text" name="product_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="files" class="btn"> <i class="entypo-camera"></i> Upload Product Image <small>(200 X 200) </small> </label>
                        <input id="files" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" accept="image/*">
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
