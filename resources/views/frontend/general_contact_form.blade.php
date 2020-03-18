<div class="price">
  <h5 class="d-inline">Contact us</h5>
  <div class="score"><span><?php echo isset($quality['quality']) ? $quality['quality'] : 'Unreviewed' ?><em><?php echo $reviews.'reviews'; ?></em></span><strong><?php echo number_format((float)$rating, 1, '.', ''); ?></strong></div>
</div>
<div id="message-contact-detail"></div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="Name" name="name" id="name" required>
    <i class="ti-user"></i>
  </div>
  <div class="form-group">
    <textarea placeholder="Your message" class="form-control" name="message" id="message" required></textarea>
    <i class="ti-pencil"></i>
  </div>
