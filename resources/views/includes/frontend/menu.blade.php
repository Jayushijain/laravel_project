<nav id="menu" class="main-menu">
    <ul>
        <li>
            <span>
                <a href="/">Home</a>
            </span>
        </li>
        <li>
            <span>
                <a href="/listings">Listings</a>
            </span>
        </li>
        <li>
            <span>
                <a href="/categories">Category</a>
            </span>
        </li>
        <li>
            <span>
                <a href="/pricings">Pricing</a>
            </span>
        </li>
        <?php //if ($this->session->userdata('is_logged_in') == 1): ?>
        @guest 
        
        @else
        <li>
            <span>
                <a href="javascript::">Account</a>
            </span>
            <ul class="manage_account_navbar">
                <li>
                    <a href="/admin<?php //echo base_url(strtolower($this->session->userdata('role')).'/dashboard');?>">Manage Account</a>
                </li>
                <li>
                    <a href="/logout">Logout</a>
                </li>
            </ul>
        </li>
        @endguest
        

        <?php //endif; ?>
    </ul>
</nav>
