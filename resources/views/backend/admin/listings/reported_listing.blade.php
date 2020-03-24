@extends('layouts.backend_layout')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Reported Listings
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div>Title</div></th>
              <th><div>Reported By</div></th>
              <th><div>Reason</div></th>
              <th><div>Status</div></th>
              <th><div>Option</div></th>
            </tr>
          </thead>
          <tbody>
            @php
            $counter = 0;
            @endphp
            @foreach ($reported_listings as $reported_listing)
	            @php
	              $listing_details = $reported_listing->listing;
	              $listing_creator = App\User::where('id',$listing_details->id)->get();
	              $reporter = $reported_listing->reporter;	
	            @endphp
              <tr>
                <td>{{ ++$counter }}</td>
                <td>
                  <strong><a href="{{ get_listing_url($listing_details->id) }}" target="_blank">{{ strlen($reported_listing->listing->name) > 20 ? substr($reported_listing->listing->name,0,20)."..." : $reported_listing->listing->name }}</a></strong><br>
                  <small>
                    <?php
                    echo $listing_creator['name'].'<br/>'.date('D, d-M-Y', $listing_details['date_added']);
                    ?>
                  </small>
                </td>
                <td>
                  <?php echo $reporter['name']; ?><br>
                  <small>
                    <?php
                    echo date('D, d-M-Y', $reported_listing['date_added']);
                    ?>
                  </small>
                </td>
                <td>
                  <?php
                  echo $reported_listing['report'];
                  ?>
                </td>
                <td class="text-center">
                  <?php if ($listing_details['status'] == 'pending'): ?>
                    <i class="mdi mdi-circle" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing_details['status']); ?>"></i>
                  <?php elseif ($listing_details['status'] == 'active'):?>
                    <i class="mdi mdi-circle" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing_details['status']); ?>"></i>
                  <?php endif; ?>
                </td>


                <td class="text-center">
                  <div class="bs-example">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <?php echo get_phrase('action'); ?> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-blue" role="menu">
                        <li><a href="<?php echo site_url('admin/listing_form/edit/'.$listing_details['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
                        <?php if ($listing_details['status'] == 'pending'): ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_active/'.$listing_details['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_active'); ?></a></li>
                        <?php else: ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_pending/'.$listing_details['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_pending'); ?></a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo get_listing_url($listing_details['id']); ?>" target="_blank"><?php echo get_phrase('view_in_website'); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/reported_listings/delete/'.$reported_listing['id']); ?>');"><?php echo get_phrase('delete_this_report'); ?></a></li>
                        <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/delete/'.$listing_details['id']); ?>');"><?php echo get_phrase('delete_this_listing'); ?></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="dropleft">
                    <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu">
                    </ul>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- end col-->
</div>


@stop