<header class="header menu_fixed">
    <div id="logo">
        <a href="/" title="Sparker - Directory and listings template">
            <img src="global/light_logo.png" width="165" height="35" alt="" class="logo_normal">
            <img src="global/dark_logo.png" width="165" height="35" alt="" class="logo_sticky">
        </a>
    </div>
    <ul id="top_menu">
        <?php //if ($this->session->userdata('is_logged_in') != 1): ?>
        @guest
        <li>
            <a href="/login" class="login" title="Sign In">Sign In</a>
        </li>
        @endguest
        <?php //endif; ?>
    </ul>
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    @include('includes.frontend.menu')
</header>
