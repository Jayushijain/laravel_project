<div class="row mb-3">
	<div class="col-12">
		<h5 class="mb-3">Contact</h5>
		<?php if($listing_detail['website'] != ""){ ?>
			<a href="<?php echo 'http://www.'.$listing_detail['website']; ?>" target="_blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-globe-6 mr-2"></i>Visit website</a>
		<?php } ?>

		<?php if($listing_detail['email'] != ""){ ?>
			<a href="mailto:<?php echo $listing_detail['email']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-email mr-2"></i>Email Us</a>
		<?php } ?>

		<?php if($listing_detail['phone'] != ""){ ?>
			<a href="tel:<?php echo $listing_detail['phone']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-phone mr-2"></i>Call Now</a>
		<?php } ?>


		<?php $social = $listing_detail['social']; ?>
		<?php $social = json_decode($social, true); ?>

		<?php if($social['facebook'] != ""){ ?>
			<a href="<?php echo $social['facebook']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-facebook-6 mr-2"></i>Facebook</a>
		<?php } ?>

		<?php if($social['twitter'] != ""){ ?>
			<a href="<?php echo $social['twitter']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-twitter mr-2"></i>Twitter</a>
		<?php } ?>

		<?php if($social['linkedin'] != ""){ ?>
			<a href="<?php echo $social['linkedin']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-linkedin mr-2"></i>Linkedin</a>
		<?php } ?>
	</div>
</div>