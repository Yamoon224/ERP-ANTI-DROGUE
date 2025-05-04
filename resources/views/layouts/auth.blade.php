<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" layout-wide customizer-hide" dir="ltr" data-skin="default" data-assets-path="{{ base_path() }}/assets/" data-template="vertical-menu-template-semi-dark" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

        <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <script>
            (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
        </script>
        <!-- End Google Tag Manager -->
    
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

        <!-- Theme Config Js -->
        <script src="{{ asset('assets/js/hyper-config.js') }}"></script>
        <!-- Vendor css -->
        <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
        <!-- Icons css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body class="authentication-bg position-relative">
        <div class="position-absolute start-0 end-0 start-0 bottom-0 w-100 h-100">
            <svg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 800 800'>
                <g fill-opacity='0.22'>
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.1);" cx='400' cy='400' r='600' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.2);" cx='400' cy='400' r='500' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.3);" cx='400' cy='400' r='300' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.4);" cx='400' cy='400' r='200' />
                    <circle style="fill: rgba(var(--ct-primary-rgb), 0.5);" cx='400' cy='400' r='100' />
                </g>
            </svg>
        </div>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-4 col-md-6 col-sm-6 col-xs-8">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header py-4 text-center bg-primary">
                                <a><span><img src="{{ asset('images/logo.png') }}" alt="LOGO" height="22"></span></a>
                            </div>
    
                            <div class="card-body p-4">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer footer-alt">
            <script>document.write(new Date().getFullYear())</script> © {{ env('APP_CONCEPTOR') }}
        </footer>
        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
    </body>
</html>
