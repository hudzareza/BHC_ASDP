<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin | @yield('title')" />
    <meta name="keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {
            !!json_encode(['csrfToken' => csrf_token()]) !!
        };
    </script>
    <title>Admin | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/images/logo-bhc.png') }}" type="image/png" sizes="18x16">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    </script>
    <link rel="stylesheet" href="{{ asset('assets/css/cropper.css') }}" />
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/js/cropper.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('backend/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css?ver=2') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/datatable.min.css') }}">
    <link href="{{ asset('backend/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('backend/css/custom.css') }}">
    <style>
        .dz-max-files-reached {
            pointer-events: none;
            cursor: default;
        }

        .dropzone .dz-preview .dz-remove {
            pointer-events: auto;
        }

        .sc-right {
            float: right;
        }

        .sc-left {
            display: inline;
        }
    </style>
    @yield('custom-css')
</head>

<body>
    <div id="app">
        <div class="total-user-active d-none"></div>
        <div class="table-last-seen d-none"></div>
        <!-- home Vue component -->
        <home></home>
    </div>
    @include('shared_admin.loader')
    <div class="page-loade hiddenr" id="page-loader">
        <div class="loader"><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span><span class="loader-item"></span>
        </div>
    </div>
    <div class="theme-layout">
        @include('shared_admin.header')
        @include('shared_admin.sidebar')
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-content">
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
        @include('shared_admin.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('backend/js/main.min.js') }}"></script>
    <script src="{{ asset('backend/js/vivus.min.js') }}"></script>
    <script src="{{ asset('backend/js/script.js') }}"></script>
    <script src="{{ asset('backend/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/js/graphs-scripts.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/datatable.min.js') }}"></script>
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

        // datatable start 5
        $(document).ready(function() {
            $('#myTableContact').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        "orderable": false,
                        "width": "300px",
                        "targets": 4
                    },
                ]
            });
        });

        // datatable start 5 bahasa
        $(document).ready(function() {
            $('#myTableBahasa').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        "orderable": false,
                        "width": "300px",
                        "targets": 4
                    },
                ]
            });
        });

        // datatable start 8
        $(document).ready(function() {
            $('#myTableEvent').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 4
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 5
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 6
                    },
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 7
                    },
                ]
            });
        });

        // datatable start 4
        $(document).ready(function() {
            $('#myTableList').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "orderable": false,
                        "width": "300px",
                        "targets": 3
                    },
                ]
            });
        });

        // datatable start 4
        $(document).ready(function() {
            $('#myTableRole').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "orderable": false,
                        "width": "300px",
                        "targets": 3
                    },
                ]
            });
        });

        // datatable start 6
        $(document).ready(function() {
            $('#myTableFaq').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 4
                    },
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 5
                    },
                ]
            });
        });

        // datatable start 6
        $(document).ready(function() {
            $('#myTableUser').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 4
                    },
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 5
                    },
                ]
            });
        });

        // datatable start 7
        $(document).ready(function() {
            $('#myTableJelajah').DataTable({
                "columnDefs": [{
                        "width": "50px",
                        "targets": 0
                    }, // Kolom pertama
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 1
                    }, // Kolom kedua
                    {
                        "width": "200px",
                        "targets": 2
                    }, // Kolom ketiga
                    {
                        "width": "300px",
                        "targets": 3
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 4
                    },
                    {
                        // "orderable": false,
                        "width": "200px",
                        "targets": 5
                    },
                    {
                        "orderable": false,
                        "width": "200px",
                        "targets": 6
                    },
                ]
            });
        });
    </script>
    @yield('custom-js')
</body>

</html>