<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

	@include('shared.navbar')

	<main>

		<section class="k_e_1">
			<div class="main-banner" style="background: url('assets/images/banner/bhc_51.png')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">Krakatau Park</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="assets/images/arrow-right.png"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('tiket.promo.main')}}">{{__('navbar.tiket_promo')}}</a></li>
							<li class="breadcrumb-item"><img src="assets/images/arrow-right.png"></li>
							<li class="breadcrumb-item active" aria-current="page">Krakatau Park</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">
				<div class="info-bhc">
					<p>{{__('tiket.header_pesan_tiket')}} Krakatau Park</p>
				</div>
				<div class="widget-plugin">
					<!-- <a id="___GOERS___widget" href="https://page.goersapp.com/?link=venues/bakauheni-harbour-city--bhcasdp" data-background-color="transparent">Bakauheni Harbour City</a> -->
					<a id="___GOERS___widget" href="https://goersapp.com/venues/bakauheni-harbour-city--bhcasdp" data-background-color="transparent">Bakauheni Harbour City</a>
					<script src="https://d1ah56qj523gwb.cloudfront.net/widget/1.2.1/widget.min.js" integrity="sha384-SYWte49En/51CagiEURWoKO+a4U1ZOvF4U5bqEuKX52fp/ikiP8onM2mZ4hxZfKg" crossorigin="anonymous"></script>
					<script src="https://d1ah56qj523gwb.cloudfront.net/widget/scroller/1.0.0/widget.scroller.min.js" integrity="sha384-OzDpNO+ICNdbnJXZOq3wvYMMY/wWP5AMMdNq4qrleB+ELuEuRbZK6gZP95Tcx1in" crossorigin="anonymous"></script>

				</div>
			</div>
		</section>
	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')

</body>

</html>