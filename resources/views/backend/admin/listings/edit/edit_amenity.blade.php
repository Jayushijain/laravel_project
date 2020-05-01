@php
	$amenity_id = explode(",",$listing->amenity_id);	
@endphp
<div class="col-lg-offset-2 col-lg-8">
  <div class="row">
    @foreach ($amenities as $amenity)
       
    <div class="col-lg-4" style="margin-bottom: 10px;">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="amenity_id[]" id="{{ $amenity->id }}" value="{{ $amenity->id }}" 
        @for ($i = 0; $i < count($amenity_id); $i++) 
        @if ($amenity_id[$i] == $amenity->id)
        	{{ 'checked' }} @endif
          @endfor>
        <label class="custom-control-label" for="{{ $amenity->id }}"><i class="{{ $amenity->icon }}" style="color: #636363;"></i> {{ $amenity->name }}</label>
      </div>
    </div>
    
  @endforeach
</div>
</div>