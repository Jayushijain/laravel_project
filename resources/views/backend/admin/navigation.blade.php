<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="margin-top: 0px;">
            <a href="#" class="sidebar-collapse-icon" onclick="hide_brand()">
                <i class="entypo-menu"></i>
            </a>
        </div>
        <script type="text/javascript">
        function hide_brand() {
            $('#branding_element').toggle();
        }
        </script>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>

    <div style=""></div>
    <ul id="main-menu" class="">
        <div style="text-align: -webkit-center;" id="branding_element">
            Demo
            <img src="<?php //echo base_url('assets/global/light_logo.png'); ?>"  style="max-height:30px;"/>
        </div>
        <br>

        <!-- Home -->
        <li class="@if($page_info['page_name'] == 'dashboard') {{ 'active' }} @endif" style="border-top:1px solid #232540;">
            <a href="/admin">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Category -->
        <li class="@if ($page_info['page_name'] == 'categories' || $page_info['page_name'] == 'sub_categories' || $page_info['page_name'] == 'add_categories' || $page_info['page_name'] == 'edit_category') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-globe"></i>
                <span>Categories</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'categories') {{ 'active' }} @endif">
                    <a href="{{ route('categories.index') }}">
                        <span><i class="entypo-dot"></i> Categories</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_category') {{ 'active' }} @endif">
                    <a href="{{ route('categories.create') }}">
                        <span><i class="entypo-dot"></i>Add New Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Amenity -->
        <li class="@if ($page_info['page_name'] == 'amenities' ||$page_info['page_name'] == 'amenity_add' || $page_info['page_name'] == 'amenity_edit') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Amenities</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'amenity') {{ 'active' }} @endif">
                    <a href="{{ route('amenities.index') }}">
                        <span><i class="entypo-dot"></i>Amenities</span>
                    </a>
                </li>

                <li class=" @if ($page_info['page_name'] == 'amenity_add') {{ 'active' }} @endif ">
                    <a href="{{ route('amenities.create') }}">
                        <span><i class="entypo-dot"></i>Add New Amenity</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Listings -->
        <li class="<?php //if ($page_name == 'listings' || $page_name == 'listing_add_wiz' || $page_name == 'listing_edit_wiz' || $page_name == 'reported_listings' || $page_name == 'claimed_listings') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Listings<?php //echo get_phrase('listings'); ?></span>
            </a>
            <ul>
                <li class="<?php //if ($page_name == 'listings') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/listings'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('listings'); ?></span>
                    </a>
                </li>

                <li class="<?php //if ($page_name == 'listing_add_wiz') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/listing_form/add'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('add_new_listing'); ?></span>
                    </a>
                </li>
                <li class="<?php //if ($page_name == 'claimed_listings') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/claimed_listings'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('claimed_listings'); ?></span>
                    </a>
                </li>
                <li class="<?php //if ($page_name == 'reported_listings') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/reported_listings'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('reported_listings'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Bookings -->
        <li class="<?php //if ($page_name == 'booking_request_hotel' || $page_name == 'booking_request_restaurant' || $page_name == 'booking_request_beauty') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Bookings<?php //echo get_phrase('booking_requests'); ?></span>
            </a>
            <ul>
                <li class="<?php //if ($page_name == 'booking_request_hotel') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/booking_request_hotel'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('hotel'); ?></span>
                    </a>
                </li>

                <li class="<?php //if ($page_name == 'booking_request_restaurant') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/booking_request_restaurant'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('restaurant'); ?></span>
                    </a>
                </li>
                <li class="<?php //if ($page_name == 'booking_request_beauty') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/booking_request_beauty'); ?>">
                        <span><i class="entypo-dot"></i> <?php// echo get_phrase('beauty'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Cities -->
        <li class="<?php //if ($page_name == 'cities' || $page_name == 'city_add' || $page_name == 'city_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-location-arrow"></i>
                <span>Cities<?php //echo get_phrase('cities'); ?></span>
            </a>
            <ul>
                <li class="<?php //if ($page_name == 'cities') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/cities'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('cities'); ?></span>
                    </a>
                </li>

                <li class="<?php //if ($page_name == 'city_add') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/city_form/add'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('add_new_city'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Pricing -->
        <li class="<?php //if ($page_name == 'packages' || $page_name == 'package_add' || $page_name == 'package_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Pricing<?php //echo get_phrase('pricings'); ?></span>
            </a>
            <ul>
                <li class="<?php //if ($page_name == 'packages') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/packages'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('all_packages'); ?></span>
                    </a>
                </li>

                <li class="<?php //if ($page_name == 'package_add') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/package_form/add'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('add_new_package'); ?></span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Offline Payment -->
        <li class="<?php //if ($page_name == 'offline_payment') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php //echo site_url('admin/offline_payment'); ?>">
                <i class="fa fa-archive"></i>
                <span>Offline Payment<?php //echo get_phrase('offline_payment'); ?></span>
            </a>
        </li>

        <!-- Reports -->
        <li class="<?php //if ($page_name == 'report' || $page_name == 'package_invoice') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php //echo site_url('admin/report'); ?>">
                <i class="fa fa-paperclip"></i>
                <span>Reports<?php //echo get_phrase('report'); ?></span>
            </a>
        </li>
        <!-- Rating wise quality -->
        <li class="<?php //if ($page_name == 'rating_wise_quality' || $page_name == 'edit_rating_wise_quality') echo 'active'; ?> " style="border-top:1px solid #232540;">
            <a href="<?php //echo site_url('admin/rating_wise_quality'); ?>">
                <i class="fa fa-thumbs-up"></i>
                <span>Rating wise quality<?php //echo get_phrase('rating_wise_quality'); ?></span>
            </a>
        </li>

        <!-- Users -->
        <li class="<?php //if ($page_name == 'agents' || $page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') echo 'opened active has-sub'; ?>">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users<?php //echo get_phrase('users'); ?></span>
            </a>
            <ul>
                <li class="<?php //if ($page_name == 'users') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/users'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('users'); ?></span>
                    </a>
                </li>

                <li class="<?php //if ($page_name == 'user_add') echo 'active'; ?> ">
                    <a href="<?php //echo site_url('admin/user_form/add'); ?>">
                        <span><i class="entypo-dot"></i> <?php //echo get_phrase('add_new_user'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- SETTINGS -->
        <li class="<?php
        //if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'about' ) echo 'opened active'; ?> ">
        <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Settings<?php //echo get_phrase('settings'); ?></span>
        </a>
        <ul>
            <li class="<?php //if ($page_name == 'system_settings') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/system_settings'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('system_settings'); ?></span>
                </a>
            </li>
            <li class="<?php //if ($page_name == 'frontend_settings') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/frontend_settings'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('frontend_settings'); ?></span>
                </a>
            </li>
            <li class="<?php //if ($page_name == 'payment_settings') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/payment_settings'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('payment_settings'); ?></span>
                </a>
            </li>
            <li class="<?php //if ($page_name == 'manage_language') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/manage_language'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('language_settings'); ?></span>
                </a>
            </li>
            <li class="<?php //if ($page_name == 'smtp_settings') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/smtp_settings'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('smtp_settings'); ?></span>
                </a>
            </li>
            <li class="<?php //if ($page_name == 'about') echo 'active'; ?> ">
                <a href="<?php //echo site_url('admin/about'); ?>">
                    <span><i class="entypo-dot"></i> <?php //echo get_phrase('about'); ?></span>
                </a>
            </li>
        </ul>
    </li>
</ul>
</div>
