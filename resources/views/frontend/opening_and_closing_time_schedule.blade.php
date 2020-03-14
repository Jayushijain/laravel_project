
<div class="opening">
  <div class="ribbon">
    <span class="<?php echo strtolower(now_open($listing_detail['id'])) == 'closed' ? 'closed' : 'open'; ?>"><?php echo now_open($listing_detail['id']); ?></span>
  </div>
  <i class="icon_clock_alt"></i>
  <h4>Opening hours</h4>
  <?php //$time_config = $this->db->get_where('time_configuration', array('listing_id' => $listing_id))->row_array(); 
        $time_config = get_opening_time($listing_detail['id']);
  ?>
  <div class="row">
    <div class="col-md-6">
      <ul>
        <li>
          Saturday
          <span>
            <?php
             $time_interval = explode('-', $time_config->saturday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          Sunday
          <span>
            <?php
             $time_interval = explode('-', $time_config->sunday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          Monday
          <span>
            <?php
             $time_interval = explode('-', $time_config->monday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          Tuesday
          <span>
            <?php
             $time_interval = explode('-', $time_config->tuesday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul>
        <li>
          Wednesday
          <span>
            <?php
             $time_interval = explode('-', $time_config->wednesday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          Thursday
          <span>
            <?php
             $time_interval = explode('-', $time_config->thursday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
         Friday
          <span>
            <?php
             $time_interval = explode('-', $time_config->friday);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo 'closed';
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
      </ul>
    </div>
  </div>
</div>
