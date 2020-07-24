<header class="header_in is_sticky menu_fixed">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-12">
        <div id="logo">
          <a href="/<?php //echo site_url('home'); ?>">
            <img src="{{ asset('/global/favicon.png') }}"  style="max-height:30px;position: relative;
  bottom: 5px;"/>
            <span style="font-size:25px;color:black">Ziolty</span>
          </a>
        </div>
      </div>
      <div class="col-lg-9 col-12">
        @guest
        <ul id="top_menu">
          <?php //if ($this->session->userdata('is_logged_in') != 1): ?>
          <li>
            <a href="/login<?php //echo site_url('home/login'); ?>" class="login" title="Sign In">Sign In</a>
          </li>
          <?php //endif; ?>
        </ul>
        @endguest
        <!-- /top_menu -->
        <a href="#menu" class="btn_mobile">
          <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
              <div class="hamburger-inner"></div>
            </div>
          </div>
        </a>
        @include('includes.frontend.menu')
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</header>
<!-- /header -->
