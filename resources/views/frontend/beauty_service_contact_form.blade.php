<div class="price">
	<h5 class="d-inline">Appointment</h5>
	<div class="score"><span><?php echo isset($quality['quality']) ? $quality['quality'] : 'Unreviewed' ?><em><?php echo $reviews.'reviews'; ?></em></span><strong><?php echo number_format((float)$rating, 1, '.', ''); ?></strong></div>
</div>

<div class="form-group" id="input-dates">
	<input class="form-control date-picker" type="text" name="dates" placeholder="When.." required>
	<i class="icon_calendar"></i>
</div>

<div class="form-group">
	<select class="form-control" name="service" id="service" required>
		<option value="">Select A Service</option>
		<?php
		    $services = get_beauty($listing_detail['id']);
		 	// $services = $this->db->get_where('beauty_service', array('listing_id' => $listing_id))->result_array();
		  	foreach($services as $service){
		  		$times = explode(',', $service->service_times);
		  		$time_from = strtotime($times[0].":00");
                $time_to   = strtotime($times[1].":00");
		?>
			<option value="<?php echo $service->id; ?>">
				<?php echo $service->name; ?>
				<?php echo '('.date('h:i A', $time_from).' - '.date('h:i A', $time_to).')'; ?>
			</option>
		<?php } ?>
	</select>
</div>

<div class="form-group">
	<input id="timepicker" onchange="checkTime()" name="time" placeholder="00:00" width="100%" required>
    <script>
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</div>

<div class="form-group">
	<textarea name="note" class="form-control" placeholder="Note" style="height: 80px;" required></textarea>
</div>

<script>
	$('document').ready(function(){
		$('#service').show();
	});
	function checkTime(){
		var booking_time = $('#timepicker').val();
		var service_id = $('#service').val();
		if(service_id != "" && booking_time != ""){
			$.ajax({
				url: "home/beauty_service_time"+service_id+"/"+booking_time,
				success: function(response){
					if(response != 1){
						$('#timepicker').val('');
						toastr.error('The time must be between opening and closing time.');
					}
				}
			});
		}
	}
</script>