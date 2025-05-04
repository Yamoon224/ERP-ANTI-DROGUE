<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class=" layout-navbar-fixed layout-menu-fixed layout-compact "
    dir="ltr"
    data-skin="default"
    data-assets-path="{{ base_path() }}/assets/"
    data-template="vertical-menu-template-semi-dark"
    data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>{{ config('app.name', 'ANTI-DROGUE') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

        <!-- Canonical SEO -->
        <meta name="description" content="Sneat is the best bootstrap 5 dashboard for responsive web apps. Streamline your app development process with ease." />
        
        <meta name="keywords" content="ERP, APP DE GESTION, ADMINISTRATION, FONCTIONNAIRE" />
        <meta property="og:title" content="ERP ANTI-DROGUE" />
        <meta property="og:type" content="ERP" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image" content="https://themeselection.com/wp-content/uploads/edd/2024/08/sneat-dashboard-pro-bootstrap-smm-image.png" />
        <meta property="og:description" content="ERP ANTI-DROGUE est une application de gestion de personnel de la cellule ANTI-DROGUE" />
        <meta property="og:site_name" content="ANTI-DROGUE" />
        <link rel="canonical" href="{{ url()->current() }}" />
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
        
        @stack('links')

        <!-- Theme Config Js -->
        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>
        <!-- Vendor css -->
        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- Icons css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Begin page -->
        <div class="wrapper">
            <x-navbar-custom></x-navbar-custom>

            <x-leftside-menu></x-leftside-menu>

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>

                <x-footer></x-footer>
            </div>
        </div>

        <x-offcanvas></x-offcanvas>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        @stack('scripts')
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
