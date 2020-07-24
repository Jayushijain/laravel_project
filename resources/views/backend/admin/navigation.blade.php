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
            <img src="{{ asset('/global/favicon.png') }}"  style="max-height:30px;position: relative;
  bottom: 5px;"/>
            <span style="font-size:25px;color:white">Ziolty</span>
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
        <li class="@if ($page_info['page_name'] == 'amenities' ||$page_info['page_name'] == 'add_amenity' || $page_info['page_name'] == 'edit_amenity') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-puzzle-piece"></i>
                <span>Amenities</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'amenities') {{ 'active' }} @endif">
                    <a href="{{ route('amenities.index') }}">
                        <span><i class="entypo-dot"></i>Amenities</span>
                    </a>
                </li>

                <li class=" @if ($page_info['page_name'] == 'add_amenity') {{ 'active' }} @endif ">
                    <a href="{{ route('amenities.create') }}">
                        <span><i class="entypo-dot"></i>Add New Amenity</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Listings -->
        <li class="@if ($page_info['page_name'] == 'listings' || $page_info['page_name'] == 'add_listing' || $page_info['page_name'] == 'listing_edit_wiz' || $page_info['page_name'] == 'reported_listings' || $page_info['page_name'] == 'claimed_listings') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Listings</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'listings') {{ 'active' }} @endif">
                    <a href="{{ route('listings.index') }}">
                        <span><i class="entypo-dot"></i> Listings</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_listing') {{ 'active' }} @endif">
                    <a href="{{ route('listings.create') }}">
                        <span><i class="entypo-dot"></i> Add New Listing</span>
                    </a>
                </li>
                <li class="@if ($page_info['page_name'] == 'claimed_listing') {{ 'active' }} @endif">
                    <a href="{{ route('claimed_listings.index') }}">
                        <span><i class="entypo-dot"></i>Claimed Listings</span>
                    </a>
                </li>
                <li class="@if ($page_info['page_name'] == 'reported_listing') {{ 'active' }} @endif">
                    <a href="{{ route('reported_listings.index') }}">
                        <span><i class="entypo-dot"></i>Reported Listings</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Bookings -->
        <li class="@if ($page_info['page_name'] == 'booking_request_hotel' || $page_info['page_name'] == 'booking_request_restaurant' || $page_info['page_name'] == 'booking_request_beauty') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Booking Requests</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'booking_request_hotel') {{ 'active' }} @endif ">
                    <a href="{{ route('booking.request','hotel') }}">
                        <span><i class="entypo-dot"></i>Hotel</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'booking_request_restaurant') {{ 'active' }} @endif ">
                    <a href="{{ route('booking.request','restaurant') }}">
                        <span><i class="entypo-dot"></i>Restaurant</span>
                    </a>
                </li>
                <li class="@if ($page_info['page_name'] == 'booking_request_beauty') {{ 'active' }} @endif ">
                    <a href="{{ route('booking.request','beauty') }}">
                        <span><i class="entypo-dot"></i>Beauty</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Cities -->
        <li class="@if ($page_info['page_name'] == 'cities' || $page_info['page_name'] == 'add_city' || $page_info['page_name'] == 'edit_city') {{ 'opened active has-sub' }} @endif ">
            <a href="#">
                <i class="fa fa-location-arrow"></i>
                <span>Cities</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'cities') {{ 'active' }} @endif">
                    <a href="{{ route('cities.index') }}">
                        <span><i class="entypo-dot"></i>Cities</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_city') {{ 'active' }} @endif">
                    <a href="{{ route('cities.create') }}">
                        <span><i class="entypo-dot"></i>Add New City</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Pricing -->
        <li class="@if ($page_info['page_name'] == 'packages' || $page_info['page_name'] == 'add_package' || $page_info['page_name'] == 'edit_package') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Pricing</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'packages') {{ 'active' }} @endif ">
                    <a href="{{ route('packages.index') }}">
                        <span><i class="entypo-dot"></i>All Packages</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_package') {{ 'active' }} @endif">
                    <a href="{{ route('packages.create') }}">
                        <span><i class="entypo-dot"></i>Add New Package</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Offline Payment -->
        <li class="@if ($page_info['page_name'] == 'offline_payment') {{ 'active' }} @endif" style="border-top:1px solid #232540;">
            <a href="{{ route('offline_payment.index') }}">
                <i class="fa fa-archive"></i>
                <span>Offline Payment</span>
            </a>
        </li>

        <!-- Reports -->
        <li class="@if ($page_info['page_name'] == 'reports' || $page_info['page_name'] == 'invoice'){{  'active' }}  @endif" style="border-top:1px solid #232540;">
            <a href="{{ route('reports.index') }}">
                <i class="fa fa-paperclip"></i>
                <span>Reports</span>
            </a>
        </li>

        <!-- Rating wise quality -->
        <li class="@if ($page_info['page_name'] == 'rating_wise_quality' || $page_info['page_name'] == 'edit_rating_wise_quality') {{ 'active' }} @endif" style="border-top:1px solid #232540;">
            <a href="{{ route('rating_wise_quality.index') }}">
                <i class="fa fa-thumbs-up"></i>
                <span>Rating wise quality</span>
            </a>
        </li>

        <!-- Users -->
        <li class="@if ($page_info['page_name'] == 'agents' || $page_info['page_name'] == 'users' || $page_info['page_name'] == 'add_user' || $page_info['page_name'] == 'edit_user') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'users') {{ 'active' }}  @endif">
                    <a href="{{ route('users.index') }}">
                        <span><i class="entypo-dot"></i> Users</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_user') {{ 'active' }} @endif">
                    <a href="{{ route('users.create') }}">
                        <span><i class="entypo-dot"></i>Add New User</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- SETTINGS -->
        <li class="@if ($page_info['page_name'] == 'system_settings' || $page_info['page_name'] == 'frontend_settings' || $page_info['page_name'] == 'payment_settings' || $page_info['page_name'] == 'smtp_settings' ) {{ 'opened active' }} @endif ">
        <a href="#">
            <i class="fa fa-cogs"></i>
            <span>{{ 'Settings' }}</span>
        </a>
        <ul>
            <li class="@if ($page_info['page_name'] == 'system_settings') {{ 'active' }} @endif">
                <a href="{{ route('system_settings.index') }}">
                    <span><i class="entypo-dot"></i>System Settings</span>
                </a>
            </li>
            <li class="@if ($page_info['page_name'] == 'frontend_settings') {{ 'active' }} @endif">
                <a href="{{ route('frontend_settings.index') }}">
                    <span><i class="entypo-dot"></i>Frontend Settings</span>
                </a>
            </li>
            <li class="@if ($page_info['page_name'] == 'payment_settings') {{ 'active' }} @endif">
                <a href="{{ route('payment_settings.index') }}">
                    <span><i class="entypo-dot"></i>Payment Settings</span>
                </a>
            </li>
            <li class="@if ($page_info['page_name'] == 'smtp_settings') {{ 'active' }} @endif">
                <a href="{{ route('smtp_settings.index') }}">
                    <span><i class="entypo-dot"></i>Smtp Settings</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
</div>
