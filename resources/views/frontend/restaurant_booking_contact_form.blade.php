<?php 
?>
<div class="price">
	<h5 class="d-inline">Book a table</h5>
	<div class="score"><span><?php echo isset($quality['quality']) ? $quality['quality'] : 'Unreviewed' ?><em><?php echo '<b>'.$reviews.'</b> Reviews'; ?></em></span><strong><?php echo number_format((float)$rating, 1, '.', ''); ?></strong></div>
</div>

<div class="form-group" id="input-dates">
	<input class="form-control date-picker" type="text" name="dates" placeholder="When.." required>
	<i class="icon_calendar"></i>
</div>

<div class="panel-dropdown">
	<a href="#">Guests<span class="qtyTotal">1</span></a>
	<div class="panel-dropdown-content right">
		<div class="qtyButtons">
			<label>Adults</label>
			<input type="text" name="qtyInput" id = "adult_guests" value="1">
		</div>
		<input type="hidden" name="adult_guests_for_booking" id = 'adult_guests_for_booking' value="0">
		<div class="qtyButtons">
			<label>Childrens</label>
			<input type="text" name="qtyInput" id ="child_guests" value="0">
		</div>
		<input type="hidden" name="child_guests_for_booking" id = "child_guests_for_booking" value="0">
	</div>
</div>

<div class="form-group clearfix">
	<div class="custom-select-form">
		<select class="wide" name="time" required>
			<option value="">Time</option>
			<option value="lunch">Lunch</option>
			<option value="dinner">Dinner</option>
		</select>
	</div>
</div>
