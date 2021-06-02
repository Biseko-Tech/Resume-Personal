<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Biseko's Resume</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Resume Website Personal Resume Details" name="keywords">
        <meta content="Resume Website Personal Resume Details" name="description">

        <!-- Favicon -->
        <link href="{{ asset('frontend/img/favicon.png') }}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick-theme.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="51">
        <div class="wrapper">

            <!-- Sidebar Start -->
            @include('frontend.sidebar')
            <!-- Sidebar End -->

            <div class="content">
                <!-- Header Start -->
                @include('frontend.header')
                <!-- Header End -->
                
                <!-- Large Button Start -->
                @include('frontend.largebutton')
                <!-- Large Button End -->
                
                <!-- About Start -->
                @include('frontend.about')
                <!-- About End -->
                
                <!-- Education Start -->
                @include('frontend.education')
                <!-- Education Start -->
                
                <!-- Experience Start -->
                @include('frontend.experience')
                <!-- Experience Start -->
                
                <!-- Service Start -->
                @include('frontend.service')
                <!-- Service Start -->
                
                <!-- Portfolio Start -->
                @include('frontend.portfolio')
                <!-- Portfolio Start -->
                
                <!-- Customers Review Start -->
                @include('frontend.customers_review')
                <!-- Customers Review End -->
                
                <!-- Contact Start -->
                @include('frontend.contact')
                <!-- Contact End -->
                
                <!-- Footer Start -->
                @include('frontend.footer')
                <!-- Footer Start -->
            </div>
        </div>
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/typed/typed.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
        
        <!-- Template Javascript -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
    </body>
</html>
