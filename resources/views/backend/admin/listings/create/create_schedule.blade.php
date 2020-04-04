@php
$days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday')
@endphp
<div class="col-sm-offset-1 col-sm-10">
  <div class="form-group">
    @foreach($days as $day)
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-6">
          <label>{{ $day.' Opening' }}</label>
          <select class="form-control selectboxit" name="{{ $day.'_opening' }}" id="{{ $day.'_opening' }}">
            <option value="closed">Closed</option>
            @for($i = 0; $i < 24; $i++)
              <option value="{{ $i }}"> {{ date('h a', strtotime("$i:00:00")) }} </option>
            @endfor
          </select>
        </div>
        <div class="col-lg-6">
          <label>{{ $day.' Closing' }}</label>
          <select class="form-control selectboxit" name="{{ $day.'_closing' }}" id="{{ $day.'_closing' }}">
            <option value="closed">{{ 'Closed' }}</option>
            @for($i = 0; $i < 24; $i++)
              <option value="{{ $i }}">{{ date('h a', strtotime("$i:00:00")) }}</option>
            @endfor
          </select>
        </div>
      </div>
    @endforeach
  </div>
</div>