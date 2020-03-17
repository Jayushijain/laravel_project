@extends('layouts.backend_layout')

@section('content')

<div class="row ">
    <div class="col-lg-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i>Add New User</a>
    </div><!-- end col-->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					General User List
				</div>
			</div>
			<div class="panel-body">
                <table class="table table-bordered datatable">
                	<thead>
                		<tr>
                			<th width="80"><div>#</div></th>
                			<th><div>Photo</div></th>
                			<th><div>Name</div></th>
                			<th><div>Email</div></th>
                			<th><div>Phone</div></th>
                			<th><div>Social Links</div></th>
                			<th><div>Option</div></th>
                		</tr>
                	</thead>
                	<tbody>
                        @php
                         $counter = 0;
                         @endphp
                         @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$counter }}</td>
                                <td class="text-center">
                                	{{-- @if(!file_exists(asset('/uploads/user_image/'.$user->id.'.jpg'))) --}}
                                		<img class="rounded-circle" src="{{ asset('/uploads/user_image/'.$user->id.'.jpg') }}" alt="" style="height: 50px; width: 50px;">
                                	{{-- @else
                                		<img class="rounded-circle" src="{{ asset('/uploads/user_image/user.png') }}" alt="" style="height: 50px; width: 50px;">
                                	@endif --}}                            	
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td class="text-center">
                                    <?php
                                      $social_links = json_decode($user->social, true);
                                     ?>
                                     <a href="{{ $social_links['facebook'] }}" style="padding: 5px;" target="_blank"><i class = 'entypo-facebook'></i></a>
                                     <a href="{{ $social_links['twitter'] }}" style="padding: 5px;" target="_blank"><i class = 'entypo-twitter'></i></a>
                                     <a href="{{ $social_links['linkedin'] }}" style="padding: 5px;" target="_blank"><i class = 'entypo-linkedin'></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-default btn-sm btn-icon icon-left">
                    					<i class="entypo-pencil"></i>
                    					Edit
                    				</a>
                    				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('{{ 'users' }}','{{ $user->id }}');">
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
	</div><!-- end col-->
</div>

@stop