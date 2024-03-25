<!DOCTYPE html>
<html lang="en">

<head>    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    <link rel="icon" href="{{ asset('logo/icon.png') }}" type="image/png" sizes="16x16">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/cropper.css') }}"/>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/cropper.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('backend/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <link href="{{ asset('backend/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    
    @yield('custom-css')
</head>

<body>
    <div id="app">
        <div class="total-user-active d-none"></div>
        <div class="table-last-seen d-none"></div>
        <!-- home Vue component -->
        <home></home>
    </div>
    
    <div class="theme-layout">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-content" style="padding-left:0% !important;padding-top:0% !important;">
                        <h4 class="main-title mb-0">@yield('content-title')</h4>
                        @if (Session::has('success'))
                            <div class="bg-gradient-success uk-light" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('info'))
                            <div class="bg-gradient-primary uk-light" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <p>{{ Session::get('info') }}</p>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-gradient-danger uk-light" uk-alert>
                                <a class="uk-alert-close" uk-close></a>
                                <ul>
                                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('backend/js/main.min.js') }}"></script>
    <script src="{{ asset('backend/js/vivus.min.js') }}"></script>
    <script src="{{ asset('backend/js/script.js') }}"></script>
    <script src="{{ asset('backend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/graphs-scripts.js') }}"></script>
    <script>
        $(document).ready(function() {
            loadUserActive();

            function loadUserActive() {
                var url = "";
                $.get(url, function(data) {
                    // console.log(data.data_user_active);
                    $('.total-user-active').html(data.total_user_active);
                    $('.table-last-seen').html(data.data_user_active);
                });
            }
            $("#custompreloader").delay(1000).slideUp('slow');
            Echo.channel('refreshUserActive')
                .listen('UserActiveEvent', function(e) {
                    loadUserActive();
                });
        });
    </script>
    @yield('custom-js')
</body>

</html>
