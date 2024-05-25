<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

	@include('shared.navbar')

	<main>

		<section class="k_e_1">
			<div class="main-banner" style="background: url('{{asset('assets/images/banner/bhc_51.png')}}')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">{{__('navbar.tiket_promo')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('tiket.promo.main')}}">{{__('navbar.tiket_promo')}}</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">
				<div class="info-bhc">
					<p>{{__('tiket.header')}}</p>
				</div>
				<div class="list-tiket">
					<div class="d-flex">
						<div class="fill-flex">
							<ul class="list-tiket-content">
								<li><img src="{{asset('assets/images/krakatau-park.png')}}" class="img-logo-tiket"></li>
								<li>
									<p class="notranslate">Krakatau Park</p>
								</li>
								<li><a href="{{route('tiket.detail')}}" class="btn-green" target="_blank">{{__('tiket.btn_tiket')}}</a></li>
							</ul>
						</div>
						<div class="fill-flex">
							<ul class="list-tiket-content">
								<li><img src="{{asset('assets/images/siger.png')}}" class="img-logo-tiket"></li>
								<li>
									<p class="notranslate">Siger Park</p>
								</li>
								<li><a href="{{route('tiket.soon')}}" class="btn-green" target="_blank">{{__('tiket.btn_tiket')}}</a></li>
							</ul>
						</div>
					</div>
					@foreach($tiket as $tklist)
					<div class="d-flex">
						<div class="fill-flex">
							<ul class="list-tiket-content">
								<li><img src="{{asset('images/article/').'/'.$tklist->photo}}" class="img-logo-tiket"></li>
								<li>
									<p class="notranslate">{{ucwords($tklist->name)}}</p>
								</li>
								<li><a href="https://{{$tklist->url}}" class="btn-green" target="_blank">{{__('tiket.btn_tiket')}}</a></li>
							</ul>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">
				<div class="info-bhc">
					<p>{{__('promo.header')}}</p>
				</div>
				<?php
				if (empty($promo)) {
					// print_r($beritas);die();
				?>
					<div class="list" style="text-align: center;">
						<img style="width:190px;height:190px;margin-bottom:15px;margin-top:20px;" src="{{asset('assets/images/nodata.png')}}" alt="">
						<h4>
							<p>{{__('event.nodata')}}</p>
						</h4>
					</div>
				<?php
				} else {
				?>
					<div class="list">
						<ul class="list-content">
							@foreach($promo as $prlist)
							<li>
								<div class="card-2">
									<div class="inner-card-2">

										<figure>
											<a href="{{ route('tiket.promo.main') }}/{{$prlist->id}}/detail"><img src="{{asset('images/article').'/'.$prlist->photo}}"></a>
										</figure>

										<a href="{{ route('tiket.promo.main') }}/{{$prlist->id}}/detail">
											<p class="title">{{$prlist->title}}</p>
										</a>

									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				<?php
				}
				?>
			</div>
		</section>

	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')

</body>

</html>