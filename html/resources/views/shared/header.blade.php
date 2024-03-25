<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BHC</title>
	<link rel="icon" href="{{ asset('assets/images/logo-bhc.png') }}" type="image/png" sizes="18x16">
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<!-- Preload -->
	<link rel="preload" href="{{ asset('assets/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" as="style" />
	<link rel="preload" href="{{ asset('assets/css/style.css?ver=2') }}" as="style" />
	<link rel="preload" href="{{ asset('assets/css/custom.css') }}" as="style" />
	<link rel="preload" href="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}" as="script" />
	<!-- Stylesheet -->
	<link href="{{ asset('assets/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/style.css?ver=2') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}" />
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script>
		window.Laravel = {
			!!json_encode(['csrfToken' => csrf_token()]) !!
		};
	</script>
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<script src="{{ asset('assets/js/splide.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('assets/css/splide.min.css') }}">
</head>