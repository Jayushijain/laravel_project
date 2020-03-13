<?php //$social_link_for_footer = json_decode(get_frontend_settings('social_links'), true);?>
<footer class="plus_border">
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_1" aria-expanded="false" aria-controls="collapse_ft_1" class="collapse_bt_mobile">
                    <h3>Quick Links</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_1">
                    <ul class="links">
                        <li>
                            <a href="/about">About</a>
                        </li>
                        <li>
                            <a href="/terms_and_conditions">Terms and Conditions</a>
                        </li>
                        <li>
                            <a href="/privacy_policy">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/faq">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_2" aria-expanded="false" aria-controls="collapse_ft_2" class="collapse_bt_mobile">
                    <h3>Categories</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_2">
                    <ul class="links">
                        <?php $categories = App\Category::get();
						
						foreach ($categories as $key => $category):
							if($category['parent_id'] > 0)
							continue;
						?>
                        <li>
                            <a href="<?php //echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>">
                                <?php echo $category['name']; ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a data-toggle="collapse" data-target="#collapse_ft_3" aria-expanded="false" aria-controls="collapse_ft_3" class="collapse_bt_mobile">
                    <h3>Contacts</h3>
                    <div class="circle-plus closed">
                        <div class="horizontal"></div>
                        <div class="vertical"></div>
                    </div>
                </a>
                <div class="collapse show" id="collapse_ft_3">
                    <ul class="contacts">
                        <li>
                            <i class="ti-home"></i>
                                <?php echo system_setting('address'); ?>
                        </li>
                        <li>
                            <i class="ti-headphone-alt"></i>
                            <?php echo system_setting('phone'); ?>
                        </li>
                        <li>
                            <i class="ti-email"></i>
                            <a href="#0">
                            <?php echo system_setting('system_email'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="social-links">
                    <h5>Follow us</h5>
                    <ul>
                        <li>
                            <a href="<?php //echo $social_link_for_footer['facebook']; ?>">
                                <i class="ti-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo $social_link_for_footer['twitter']; ?>">
                                <i class="ti-twitter-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo $social_link_for_footer['google']; ?>">
                                <i class="ti-google"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo $social_link_for_footer['pinterest']; ?>">
                                <i class="ti-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php //echo $social_link_for_footer['instagram']; ?>">
                                <i class="ti-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <ul id="additional_links">
                    <li>
                        <a href="/about">About</a>
                    </li>
                    <li>
                        <a href="/terms_and_conditions">Terms and conditions</a>
                    </li>
                    <li>
                        <a href="/privacy_policy">Privacy policy</a>
                    </li>
                    <li>
                        <a href="/faq">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/footer-->
