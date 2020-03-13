<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags and seo configuration -->
    @include('includes.frontend.site_meta')

    <!-- Top css library files -->
    @include('includes.frontend.includes_top')

</head>

<body>

    <div id="page">

        @yield('content')

        @include('includes.frontend.footer')
    </div>

    

</body>

<!-- Signin popup -->
@include('includes.frontend.signin_popup')

<!-- Back to top button -->
<div id="toTop"></div>

<!-- Bottom js library files -->
@include('includes.frontend.includes_bottom')

<!--modal-->
@include('includes.frontend.modal')


</html>
