@extends('layouts.backend_layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    Wishlists
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="80"><div>#</div></th>
                            <th><div>Cover</div></th>
                            <th><div>Title</div></th>
                            <th><div>Categories</div></th>
                            <th><div>Uploaded By</div></th>
                            <th><div>Status</div></th>
                            <th><div>Date Added</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $counter = 0;
                        @endphp
                        @foreach ($listings as $listing)
                        <tr>
                            <td>{{ ++$counter }}</td>
                            <td class="text-center"><img class = "rounded-circle img-thumbnail" src="{{ asset('uploads/listing_cover_photo/'.$listing->listing_cover) }}" alt="" style="height: 50px; width: 50px;"></td>
                            <td><a href="{{ get_listing_url($listing->id) }}">{{ $listing->name }}</a></td>
                            <td>
                                @php
                                $categories = explode(',',$listing->category_id);
                                @endphp
                                @foreach ($categories as $category)
	                                @php
	                                    $category_details = App\Category::findOrFail($category);
	                                @endphp
	                                    <span class="badge badge-secondary">{{ $category_details->name }}</span><br>
                                @endforeach
                            </td>
                            <td>
                            	{{ ucwords($listing->user->name) }}
                            </td>
                            <td>
                            	@if ($listing->status == 1)
                            		{{ 'Active' }}
                            	@else
									{{ 'Pending' }}
                            	@endif</td>
                            <td>{{ date('D, d-M-Y', strtotime($listing->created_at)) }}</td>
                        </tr>
                    	@endforeach
                </tbody>
            </table>

        </div>
    </div>
</div><!-- end col-->
</div>

@stop