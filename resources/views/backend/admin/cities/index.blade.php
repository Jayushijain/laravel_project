@extends('layouts.backend_layout')

@section('content')

<!-- start page title -->
<div class="row ">
  <div class="col-lg-12">
    <a href="{{ route('cities.create') }}" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New City</a>
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          {{ $page_info['page_title'] }}
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>City Name</div></th>
              <th><div>Country</div></th>
              <th><div>Options</div></th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @foreach ($cities as $city)
            <tr>
              <td>{{ ++$counter }}</td>

              <td>{{ ucwords($city->name) }}</td>
              <td>              
                {{ ucwords($city->country->name) }}             
              </td>
              <td style="text-align: center;">
                <a href="{{ route('cities.edit',$city->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                  <i class="entypo-pencil"></i>
                  Edit
                </a>
                <a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('{{ 'cities' }}','{{ $city->id }}');">
                  <i class="entypo-cancel"></i>
                  Delete
                </a>

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

@stop

@section('scripts')


@stop