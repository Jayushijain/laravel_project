<?php
  $reviews = get_listing_wise_review($listing_detail['id']);
  $rating = get_listing_wise_rating($listing_detail['id']);
  //$user_id = $this->session->userdata('user_id');
  //$user_type = $this->db->get_where('user', array('id' => $user_id))->row('role_id');
?>
<section id="reviews">
  <h2>Reviews</h2>
  <!-- Ratings starts -->
  <div class="reviews-container add_bottom_30">
    <div class="row">
      <div class="col-lg-3">
        <div id="review_summary">
          <strong><?php echo  number_format((float)$rating, 1, '.', '');?></strong>
          <em>
            <?php
            if ($rating > 0) {
              $quality = get_rating_wise_quality($listing_detail['id']);
              echo $quality->quality;
            }
            ?>
         </em>
          <small><?php echo 'based on'.' '.$reviews.' '.'reviews'; ?></small>
        </div>
      </div>
      <div class="col-lg-9">
        <!-- Rating Progeress Bar -->
        <?php for($i = 1; $i <= 5; $i++): ?>
          <div class="row">
            <div class="col-lg-10 col-9">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo get_percentage_of_specific_rating($listing_detail['id'], $i); ?>%" aria-valuenow="<?php echo get_percentage_of_specific_rating($listing_detail['id'], $i); ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong><?php echo $i.' '.'stars'; ?></strong></small></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- Ratings ends -->

  
  <!-- /review-container -->
</section>


  <a href="/login" class="btn btn-warning float-right" >Login to review</a>

<!-- Leave a review ends -->


<script>
  function edit_review(review_id){
      $("#" + review_id).slideToggle("slow");
  }
// $(document).ready(function(){
//   $("#edit_review_button").click(function(){
//     $("#edit_review_form").slideToggle("slow");
//   });
// });
</script>
