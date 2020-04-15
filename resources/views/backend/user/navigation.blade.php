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
            <a href="{{ route('user.index') }}">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Listings -->
        @if (has_package(Auth::user()->id) != 0)            
        <li class="@if ($page_info['page_name'] == 'listings' || $page_info['page_name'] == 'add_listing' || $page_info['page_name'] == 'edit_listing' ) {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Listings</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'listings') {{ 'active' }} @endif">
                    <a href="{{ route('user_listings.index') }}">
                        <span><i class="entypo-dot"></i> Listings</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'add_listing') {{ 'active' }} @endif">
                    <a href="{{ route('user_listings.create') }}">
                        <span><i class="entypo-dot"></i> Add New Listing</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- Bookings -->
        <li class="@if ($page_info['page_name'] == 'booking_request_hotel' || $page_info['page_name'] == 'booking_request_restaurant' || $page_info['page_name'] == 'booking_request_beauty') {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-tasks"></i>
                <span>Booking Requests</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'booking_request_hotel') {{ 'active' }} @endif ">
                    <a href="{{ route('user.booking.request','hotel') }}">
                        <span><i class="entypo-dot"></i>Hotel</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'booking_request_restaurant') {{ 'active' }} @endif ">
                    <a href="{{ route('user.booking.request','restaurant') }}">
                        <span><i class="entypo-dot"></i>Restaurant</span>
                    </a>
                </li>
                <li class="@if ($page_info['page_name'] == 'booking_request_beauty') {{ 'active' }} @endif ">
                    <a href="{{ route('user.booking.request','beauty') }}">
                        <span><i class="entypo-dot"></i>Beauty</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Pricing -->
        <li class="@if ($page_info['page_name'] == 'packages' || $page_info['page_name'] == 'purchase_history' ) {{ 'opened active has-sub' }} @endif">
            <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Pricings</span>
            </a>
            <ul>
                <li class="@if ($page_info['page_name'] == 'packages') {{ 'active' }} @endif ">
                    <a href="{{ route('user_packages.index') }}">
                        <span><i class="entypo-dot"></i>All Packages</span>
                    </a>
                </li>

                <li class="@if ($page_info['page_name'] == 'purchase_history') {{ 'active' }} @endif">
                    <a href="{{ route('user.purchase_history') }}">
                        <span><i class="entypo-dot"></i>Purchase History</span>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Wishlist -->
        <li class="@if ($page_info['page_name'] == 'wishlist') {{ 'active' }} @endif" style="border-top:1px solid #232540;">
            <a href="/user/wishlist">
                <i class="fa fa-heart"></i>
                <span>Wishlist</span>
            </a>
        </li>

        <!-- SETTINGS -->
        <li class="@if ($page_info['page_name'] == 'edit_profile' ) {{ 'opened active' }} @endif ">
        <a href="{{ route('user.edit',Auth::user()->id) }}">
            <i class="fa fa-user"></i>
            <span>Account</span>
        </a>
    </li>
</ul>
</div>
