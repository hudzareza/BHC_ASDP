<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')
<style>
	.splide__slide img {
		width: 100%;
		height: auto;
	}
</style>

<body>

	@include('shared.navbar')

	<main>
		<section class="k_e_1">
			<div class="main-banner" style="background: url('assets/images/banner/bhc_51.png')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">
						{{ __('navbar.event') }}
					</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item">
								<a href="{{route('home')}}">
									{{ __('navbar.beranda') }}
								</a>
							</li>
							<li class="breadcrumb-item"><img src="assets/images/arrow-right.png"></li>
							<li class="breadcrumb-item active" aria-current="page">
								{{ __('navbar.event') }}
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<?php
		$data = json_decode(json_encode($beritas), true);

		if (empty($data)) {
			// print_r($beritas);die();
		?>
			<section class="k_e_2" style="margin-bottom:80px;">
				<div class="info-bhc">
					@if($monthName == 'Januari')
					<p>{{__('event.januari')}} {{$yearName}}</p>
					@elseif($monthName == 'Februari')
					<p>{{__('event.februari')}} {{$yearName}}</p>
					@elseif($monthName == 'Maret')
					<p>{{__('event.maret')}} {{$yearName}}</p>
					@elseif($monthName == 'April')
					<p>{{__('event.april')}} {{$yearName}}</p>
					@elseif($monthName == 'Mei')
					<p>{{__('event.mei')}} {{$yearName}}</p>
					@elseif($monthName == 'Juni')
					<p>{{__('event.juni')}} {{$yearName}}</p>
					@elseif($monthName == 'Juli')
					<p>{{__('event.juli')}} {{$yearName}}</p>
					@elseif($monthName == 'Agustus')
					<p>{{__('event.agustus')}} {{$yearName}}</p>
					@elseif($monthName == 'September')
					<p>{{__('event.september')}} {{$yearName}}</p>
					@elseif($monthName == 'Oktober')
					<p>{{__('event.oktober')}} {{$yearName}}</p>
					@elseif($monthName == 'November')
					<p>{{__('event.november')}} {{$yearName}}</p>
					@elseif($monthName == 'Desember')
					<p>{{__('event.desember')}} {{$yearName}}</p>
					@endif
				</div>
				<div class="list" style="text-align: center;">
					<img style="width:190px;height:190px;margin-bottom:15px;margin-top:20px;" src="{{asset('assets/images/nodata.png')}}" alt="">
					<h4>
						<p>
							{{ __('event.nodata') }}
						</p>
					</h4>
				</div>
			</section>

		<?php
		} else {
		?>
			<section class="k_e_2">

				<div class="container splide" id="image-carousel" aria-label="Beautiful Images">
					<div class="info-bhc">

						@if($monthName == 'Januari')
						<p>{{__('event.januari')}} {{$yearName}}</p>
						@elseif($monthName == 'Februari')
						<p>{{__('event.februari')}} {{$yearName}}</p>
						@elseif($monthName == 'Maret')
						<p>{{__('event.maret')}} {{$yearName}}</p>
						@elseif($monthName == 'April')
						<p>{{__('event.april')}} {{$yearName}}</p>
						@elseif($monthName == 'Mei')
						<p>{{__('event.mei')}} {{$yearName}}</p>
						@elseif($monthName == 'Juni')
						<p>{{__('event.juni')}} {{$yearName}}</p>
						@elseif($monthName == 'Juli')
						<p>{{__('event.juli')}} {{$yearName}}</p>
						@elseif($monthName == 'Agustus')
						<p>{{__('event.agustus')}} {{$yearName}}</p>
						@elseif($monthName == 'September')
						<p>{{__('event.september')}} {{$yearName}}</p>
						@elseif($monthName == 'Oktober')
						<p>{{__('event.oktober')}} {{$yearName}}</p>
						@elseif($monthName == 'November')
						<p>{{__('event.november')}} {{$yearName}}</p>
						@elseif($monthName == 'Desember')
						<p>{{__('event.desember')}} {{$yearName}}</p>
						@endif
					</div>

					<div class="list splide__track">
						<ul class="list-content splide__list">
							@foreach($beritas as $list)

							<li class="splide__slide">
								<div class="card-2" style="box-shadow: none !important;">
									<div class="inner-card-2">

										<figure>
											<a href="{{ route('event.main') }}/{{$list->id}}/detail"><img src="{{ asset('images/article'.'/'.$list->photo) }}"></a>
										</figure>

										<a href="{{ route('event.main') }}/{{$list->id}}/detail">
											<p style="height:50px;" class="title">{{$list->title}}</p>
										</a>

									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</section>
		<?php
		}
		?>
		<section class="k_e_3">
			<div class="container">
				<p class="title">{{ __('event.tahun_header') }} {{$yearName}}</p>
				<div class="row">
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.januari') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/1/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.februari') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/2/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.maret') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/3/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.april') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/4/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.mei') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/5/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.juni') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/6/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.juli') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/7/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.agustus') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/8/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.september') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/9/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.oktober') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/10/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.november') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/11/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card-3" style="background: url('{{asset('assets/images/banner/bg-tahun.jpg')}}');">
							<div class="inner-card-3">
								<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="date-range">
										<path id="Vector" d="M25.8333 5.33317H24.5V3.99984C24.5 3.2665 23.9 2.6665 23.1667 2.6665C22.4333 2.6665 21.8333 3.2665 21.8333 3.99984V5.33317H11.1667V3.99984C11.1667 3.2665 10.5667 2.6665 9.83333 2.6665C9.1 2.6665 8.5 3.2665 8.5 3.99984V5.33317H7.16667C5.68667 5.33317 4.51333 6.53317 4.51333 7.99984L4.5 26.6665C4.5 28.1332 5.68667 29.3332 7.16667 29.3332H25.8333C27.3 29.3332 28.5 28.1332 28.5 26.6665V7.99984C28.5 6.53317 27.3 5.33317 25.8333 5.33317ZM25.8333 25.3332C25.8333 26.0665 25.2333 26.6665 24.5 26.6665H8.5C7.76667 26.6665 7.16667 26.0665 7.16667 25.3332V11.9998H25.8333V25.3332ZM9.83333 14.6665H12.5V17.3332H9.83333V14.6665ZM15.1667 14.6665H17.8333V17.3332H15.1667V14.6665ZM20.5 14.6665H23.1667V17.3332H20.5V14.6665Z" fill="white" />
									</g>
								</svg>
								<p>{{ __('event.desember') }}</p>
								<a class="notranslate" href="{{ route('event.main') }}/12/{{$year}}/list">{{ __('event.btn_detail') }}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// new Splide( '#image-carousel' ).mount();
			var splide = new Splide('#image-carousel', {
				type: 'slide',
				autoplay: true,
				speed: 100,
				// perPage: 3,
				// focus  : 'center',
				autoWidth: true,
			});

			splide.mount();
		});
	</script>
</body>

</html>