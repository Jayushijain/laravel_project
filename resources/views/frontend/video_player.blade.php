<?php if($listing_detail['user_id'] == 1 && $listing_detail['video_url'] != ""): ?>
  <hr>
  <h3>Video</h3>
  <div class="" style="text-align: center;">
    <?php if (strtolower($listing_detail['video_provider']) == 'youtube'): ?>
      <link rel="stylesheet" href="{{ asset('global/plyr/plyr.css')}}">

      <div class="plyr__video-embed" id="player">
        <iframe height="500" src="<?php echo $listing_detail['video_url'];?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
      </div>

      <script src="{{ asset('global/plyr/plyr.js') }}"></script>
      <script>const player = new Plyr('#player');</script>

    <?php elseif (strtolower($listing_detail['video_provider']) == 'vimeo'):
      $video_details = $this->video_model->getVideoDetails($listing_detail['video_url']);
      $video_id = $video_detail['video_id'];?>

      <link rel="stylesheet" href="{{ asset('global/plyr/plyr.css') }}">
      <div class="plyr__video-embed" id="player">
        <iframe height="500" src="https://player.vimeo.com/video/<?php echo $video_id; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
      </div>

      <script src="{{ asset('global/plyr/plyr.js') }}"></script>
      <script>const player = new Plyr('#player');</script>

    <?php else :?>

      <link rel="stylesheet" href="{{ asset('global/plyr/plyr.css') }}">
      <video poster="{{ asset('uploads/listing_cover_photo') }}/{{ $listing_detail['listing_cover']}}" id="player" playsinline controls>
        <?php if (get_video_extension($listing_detail['video_url']) == 'mp4'): ?>
          <source src="<?php echo $listing_detail['video_url']; ?>" type="video/mp4">
          <?php elseif (get_video_extension($listing_detail['video_url']) == 'webm'): ?>
            <source src="<?php echo $listing_detail['video_url']; ?>" type="video/webm">
            <?php else: ?>
              <h4>Video url is not supported</h4>
            <?php endif; ?>
          </video>

          <script src="{{ asset('global/plyr/plyr.js') }}"></script>
          <script>const player = new Plyr('#player');</script>

        <?php endif; ?>
    </div>
<?php endif; ?>
