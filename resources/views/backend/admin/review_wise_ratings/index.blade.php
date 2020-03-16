@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Quality List
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Rating From</div></th>
              <th><div>Rating To</div></th>
              <th><div>Quality</div></th>
              <th><div>Options</div></th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @foreach ($qualities as $quality)
            <tr>
              <td>{{ ++$counter }}</td>

              <td>{{ $quality->rating_from }}</td>
              <td>{{ $quality->rating_to }}</td>
              <td>{{ ucfirst($quality->quality) }}</td>
              <td style="text-align: center;">
                <a href="{{ route('rating_wise_quality.edit',$quality->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                  <i class="entypo-pencil"></i>
                  Edit
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>


@stop

