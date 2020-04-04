@php
$days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday');
$time_configuratuin_details = App\TimeConfiguration::where('listing_id',$listing->id)->first();
@endphp
<div class="col-sm-offset-1 col-sm-10">
  <div class="form-group">
    @foreach($days as $day)
    @php
      $interval_array = explode('-',$time_configuratuin_details->$day);
      print_r($interval_array);
      echo $interval_array[0]
    @endphp
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-6">
          <label>{{ $day.' Opening' }}</label>
          <select class="form-control selectboxit" name="{{ $day.'_opening' }}" id="{{ $day.'_opening' }}">
            @for($i = 0; $i < 24; $i++)
              @if ($interval_array[0] != 'closed')
              @php
                echo $interval_array[0]
              @endphp
                <option value="{{ $i }}" @if ($interval_array[0] == $i) {{ 'selected' }} @endif>  {{ date('h a', strtotime("$i:00:00")) }} </option>
              @else
                <option value="closed" @if ($interval_array[0] == 'closed') {{ 'selected' }} @endif> {{ 'Closed' }} </option>
              @endif
            @endfor
          </select>
        </div>
        <div class="col-lg-6">
          <label>{{ $day.' Closing' }}</label>
          <select class="form-control selectboxit" name="{{ $day.'_closing' }}" id="{{ $day.'_closing' }}">
            @for($i = 0; $i < 24; $i++)
              @if ($interval_array[0] != 'closed')
                <option value="{{ $i }}" @if ($i == $interval_array[1])
                  {{ 'selected' }}
                @endif> {{ date('h a', strtotime("$i:00:00")) }} </option>
              @else
                <option value="closed" @if ($i == 'closed')
                  {{ 'selected' }}
                @endif> {{ 'closed' }} </option>
              @endif
            @endfor
          </select>
        </div>
      </div>
    @endforeach
  </div>
</div>