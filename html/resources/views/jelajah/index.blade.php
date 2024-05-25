<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

	@include('shared.navbar')
	<style>
		a {
			outline: 0 !important;
		}

		.magnific-img img {
			width: 100%;
			height: auto;
		}

		.mfp-bottom-bar,
		* {
			font-family: 'Abel', sans-serif;
		}

		.magnific-img {
			display: inline-block;
			width: 32.3%;
		}

		a.image-popup-vertical-fit {
			cursor: -webkit-zoom-in;
		}

		.mfp-with-zoom .mfp-container,
		.mfp-with-zoom.mfp-bg {
			opacity: 0;
			-webkit-backface-visibility: hidden;
			/* ideally, transition speed should match zoom duration */
			-webkit-transition: all 0.3s ease-out;
			-moz-transition: all 0.3s ease-out;
			-o-transition: all 0.3s ease-out;
			transition: all 0.3s ease-out;
		}

		.mfp-with-zoom.mfp-ready .mfp-container {
			opacity: 1;
		}

		.mfp-with-zoom.mfp-ready.mfp-bg {
			opacity: 0.98;
		}

		.mfp-with-zoom.mfp-removing .mfp-container,
		.mfp-with-zoom.mfp-removing.mfp-bg {
			opacity: 0;
		}

		.mfp-arrow-left:before {
			border-right: none !important;
		}

		.mfp-arrow-right:before {
			border-left: none !important;
		}

		button.mfp-arrow,
		.mfp-counter {
			opacity: 0 !important;
			transition: opacity 200ms ease-in, opacity 2000ms ease-out;
		}

		.mfp-container:hover button.mfp-arrow,
		.mfp-container:hover .mfp-counter {
			opacity: 1 !important;
		}


		/* Magnific Popup CSS */
		.mfp-bg {
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1042;
			overflow: hidden;
			position: fixed;
			background: transparent;
			opacity: 0.8;
		}

		.mfp-wrap {
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: 1043;
			position: fixed;
			outline: none !important;
			-webkit-backface-visibility: hidden;
		}

		.mfp-container {
			text-align: center;
			position: absolute;
			width: 100%;
			height: 100%;
			left: 0;
			top: 0;
			padding: 0 8px;
			box-sizing: border-box;
		}

		.mfp-container:before {
			content: '';
			display: inline-block;
			height: 100%;
			vertical-align: middle;
		}

		.mfp-align-top .mfp-container:before {
			display: none;
		}

		.mfp-content {
			position: relative;
			display: inline-block;
			vertical-align: middle;
			margin: 0 auto;
			text-align: left;
			z-index: 1045;
		}

		.mfp-inline-holder .mfp-content,
		.mfp-ajax-holder .mfp-content {
			width: 100%;
			cursor: auto;
		}

		.mfp-ajax-cur {
			cursor: progress;
		}

		.mfp-zoom-out-cur,
		.mfp-zoom-out-cur .mfp-image-holder .mfp-close {
			cursor: -moz-zoom-out;
			cursor: -webkit-zoom-out;
			cursor: zoom-out;
		}

		.mfp-zoom {
			cursor: pointer;
			cursor: -webkit-zoom-in;
			cursor: -moz-zoom-in;
			cursor: zoom-in;
		}

		.mfp-auto-cursor .mfp-content {
			cursor: auto;
		}

		.mfp-close,
		.mfp-arrow,
		.mfp-preloader,
		.mfp-counter {
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		.mfp-loading.mfp-figure {
			display: none;
		}

		.mfp-hide {
			display: none !important;
		}

		.mfp-preloader {
			color: #CCC;
			position: absolute;
			top: 50%;
			width: auto;
			text-align: center;
			margin-top: -0.8em;
			left: 8px;
			right: 8px;
			z-index: 1044;
		}

		.mfp-preloader a {
			color: #CCC;
		}

		.mfp-preloader a:hover {
			color: #FFF;
		}

		.mfp-s-ready .mfp-preloader {
			display: none;
		}

		.mfp-s-error .mfp-content {
			display: none;
		}

		button.mfp-close,
		button.mfp-arrow {
			overflow: visible;
			cursor: pointer;
			background: transparent;
			border: 0;
			-webkit-appearance: none;
			display: block;
			outline: none;
			padding: 0;
			z-index: 1046;
			box-shadow: none;
			touch-action: manipulation;
		}

		button::-moz-focus-inner {
			padding: 0;
			border: 0;
		}

		.mfp-close {
			visibility: hidden;
			width: 44px;
			height: 44px;
			line-height: 44px;
			position: absolute;
			right: 0;
			top: 0;
			text-decoration: none;
			text-align: center;
			opacity: 0.65;
			padding: 0 0 18px 10px;
			color: #FFF;
			font-style: normal;
			font-size: 28px;
			font-family: Arial, Baskerville, monospace;
		}

		.mfp-close:hover,
		.mfp-close:focus {
			opacity: 1;
		}

		.mfp-close:active {
			top: 1px;
		}

		.mfp-close-btn-in .mfp-close {
			color: #333;
		}

		.mfp-image-holder .mfp-close,
		.mfp-iframe-holder .mfp-close {
			color: #FFF;
			right: -6px;
			text-align: right;
			padding-right: 6px;
			width: 100%;
		}

		.mfp-counter {
			position: absolute;
			top: 0;
			right: 0;
			color: #CCC;
			font-size: 12px;
			line-height: 18px;
			white-space: nowrap;
		}

		.mfp-arrow {
			position: absolute;
			opacity: 0.65;
			margin: 0;
			top: 50%;
			margin-top: -55px;
			padding: 0;
			width: 90px;
			height: 110px;
			-webkit-tap-highlight-color: transparent;
		}

		.mfp-arrow:active {
			margin-top: -54px;
		}

		.mfp-arrow:hover,
		.mfp-arrow:focus {
			opacity: 1;
		}

		.mfp-arrow:before,
		.mfp-arrow:after {
			content: '';
			display: block;
			width: 0;
			height: 0;
			position: absolute;
			left: 0;
			top: 0;
			margin-top: 35px;
			margin-left: 35px;
			border: medium inset transparent;
		}

		.mfp-arrow:after {
			border-top-width: 13px;
			border-bottom-width: 13px;
			top: 8px;
		}

		.mfp-arrow:before {
			border-top-width: 21px;
			border-bottom-width: 21px;
			opacity: 0.7;
		}

		.mfp-arrow-left {
			left: 0;
		}

		.mfp-arrow-left:after {
			border-right: 17px solid #FFF;
			margin-left: 31px;
		}

		.mfp-arrow-left:before {
			margin-left: 25px;
			border-right: 27px solid #3F3F3F;
		}

		.mfp-arrow-right {
			right: 0;
		}

		.mfp-arrow-right:after {
			border-left: 17px solid #FFF;
			margin-left: 39px;
		}

		.mfp-arrow-right:before {
			border-left: 27px solid #3F3F3F;
		}

		.mfp-iframe-holder {
			padding-top: 40px;
			padding-bottom: 40px;
		}

		.mfp-iframe-holder .mfp-content {
			line-height: 0;
			width: 100%;
			max-width: 900px;
		}

		.mfp-iframe-holder .mfp-close {
			top: -40px;
		}

		.mfp-iframe-scaler {
			width: 100%;
			height: 0;
			overflow: hidden;
			padding-top: 56.25%;
		}

		.mfp-iframe-scaler iframe {
			position: absolute;
			display: block;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
			background: #000;
		}

		/* Main image in popup */
		img.mfp-img {
			width: auto;
			max-width: 100%;
			height: auto;
			display: block;
			line-height: 0;
			box-sizing: border-box;
			padding: 40px 0 40px;
			margin: 0 auto;
		}

		/* The shadow behind the image */
		.mfp-figure {
			line-height: 0;
		}

		.mfp-figure:after {
			content: '';
			position: absolute;
			left: 0;
			top: 40px;
			bottom: 40px;
			display: block;
			right: 0;
			width: auto;
			height: auto;
			z-index: -1;
			box-shadow: 0 0 8px rgba(0, 0, 0, 0.6);
			background: rgba(255, 255, 255, 1);
		}

		.mfp-figure small {
			color: rgba(255, 255, 255, 1);
			display: block;
			font-size: 12px;
			line-height: 14px;
		}

		.mfp-figure figure {
			margin: 0;
		}

		.mfp-bottom-bar {
			margin-top: -36px;
			position: absolute;
			top: 100%;
			left: 0;
			width: 100%;
			cursor: auto;
		}

		.mfp-title {
			text-align: left;
			line-height: 18px;
			color: #F3F3F3;
			word-wrap: break-word;
			padding-right: 36px;
		}

		.mfp-image-holder .mfp-content {
			max-width: 100%;
		}

		.mfp-gallery .mfp-image-holder .mfp-figure {
			cursor: pointer;
		}

		@media screen and (max-width: 800px) and (orientation: landscape),
		screen and (max-height: 300px) {

			/**
		* Remove all paddings around the image on small screen
		*/
			.mfp-img-mobile .mfp-image-holder {
				padding-left: 0;
				padding-right: 0;
			}

			.mfp-img-mobile img.mfp-img {
				padding: 0;
			}

			.mfp-img-mobile .mfp-figure:after {
				top: 0;
				bottom: 0;
			}

			.mfp-img-mobile .mfp-figure small {
				display: inline;
				margin-left: 5px;
			}

			.mfp-img-mobile .mfp-bottom-bar {
				background: rgba(0, 0, 0, 0.6);
				bottom: 0;
				margin: 0;
				top: auto;
				padding: 3px 5px;
				position: fixed;
				box-sizing: border-box;
			}

			.mfp-img-mobile .mfp-bottom-bar:empty {
				padding: 0;
			}

			.mfp-img-mobile .mfp-counter {
				right: 5px;
				top: 3px;
			}

			.mfp-img-mobile .mfp-close {
				top: 0;
				right: 0;
				width: 35px;
				height: 35px;
				line-height: 35px;
				background: rgba(255, 255, 255, 1);
				position: fixed;
				text-align: center;
				padding: 0;
			}
		}

		@media all and (max-width: 900px) {
			.mfp-arrow {
				-webkit-transform: scale(0.75);
				transform: scale(0.75);
			}

			.mfp-arrow-left {
				-webkit-transform-origin: 0;
				transform-origin: 0;
			}

			.mfp-arrow-right {
				-webkit-transform-origin: 100%;
				transform-origin: 100%;
			}

			.mfp-container {
				padding-left: 6px;
				padding-right: 6px;
			}
		}
	</style>
	<main>

		<section class="k_e_1">
			<div class="main-banner" style="background: url('{{ asset('assets/images/banner/bhc_51.png') }}')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">{{__('navbar.jelajah')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="{{ asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('jelajah.main') }}/{{$data[0]->id}}/detail">{{__('navbar.jelajah')}}</a></li>
							<li class="breadcrumb-item"><img src="{{ asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page">{{$data[0]->title}}</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container mt-4">
				<div class="row">
					<div class="col-md-8">
						<article class="content-artikel">
							<figure>
								<img src="{{ asset('images/article').'/'.$data[0]->photo }}">
							</figure>
							<h1>{{$data[0]->title}}</h1>
							<div class="d-flex mb-3">
								<div>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g id="date-range">
											<path id="Vector" d="M19 4H18V3C18 2.45 17.55 2 17 2C16.45 2 16 2.45 16 3V4H8V3C8 2.45 7.55 2 7 2C6.45 2 6 2.45 6 3V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 19C19 19.55 18.55 20 18 20H6C5.45 20 5 19.55 5 19V9H19V19ZM7 11H9V13H7V11ZM11 11H13V13H11V11ZM15 11H17V13H15V11Z" fill="#41484D" />
										</g>
									</svg>
									<p class="date">{{$data[0]->updated_at}} WIB</p>
								</div>
								<div>
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g id="people-outline">
											<path id="Vector" d="M9 12C10.93 12 12.5 10.43 12.5 8.5C12.5 6.57 10.93 5 9 5C7.07 5 5.5 6.57 5.5 8.5C5.5 10.43 7.07 12 9 12ZM9 7C9.83 7 10.5 7.67 10.5 8.5C10.5 9.33 9.83 10 9 10C8.17 10 7.5 9.33 7.5 8.5C7.5 7.67 8.17 7 9 7ZM9 13.75C6.66 13.75 2 14.92 2 17.25V18C2 18.55 2.45 19 3 19H15C15.55 19 16 18.55 16 18V17.25C16 14.92 11.34 13.75 9 13.75ZM4.34 17C5.18 16.42 7.21 15.75 9 15.75C10.79 15.75 12.82 16.42 13.66 17H4.34ZM16.04 13.81C17.2 14.65 18 15.77 18 17.25V19H21C21.55 19 22 18.55 22 18V17.25C22 15.23 18.5 14.08 16.04 13.81ZM15 12C16.93 12 18.5 10.43 18.5 8.5C18.5 6.57 16.93 5 15 5C14.46 5 13.96 5.13 13.5 5.35C14.13 6.24 14.5 7.33 14.5 8.5C14.5 9.67 14.13 10.76 13.5 11.65C13.96 11.87 14.46 12 15 12Z" fill="#41484D" />
										</g>
									</svg>
									<p class="penulis">By Admin</p>
									<!-- <p class="penulis">{{$data[0]->created_by}}</p> -->
								</div>
							</div>
							<p>
								{!! $data[0]->content !!}
							</p>
						</article>
						<style>
							.splide__slide img {
								width: 355px;
								height: 268px;
								padding: 10px;
							}

							.mfp-figure {
								position: unset !important;
							}
						</style>
						<?php
						if (empty($photo[0][0])) {
							echo "";
						} else {
						?>
							<div class="container splide" id="image-carousel" aria-label="Beautiful Images">
								<div class="list splide__track">
									<ul class="list-content splide__list">
										@foreach($photo[0] as $img)
										<li class="splide__slide img-gallery-magnific">
											<div class="magnific-img">
												<a class="image-popup-vertical-fit" href="{{asset('images/article/jelajah').'/'.$img}}">
													<figure style="padding: 2px;">
														<img src="{{asset('images/article/jelajah').'/'.$img}}">
													</figure>
												</a>
											</div>
											<!-- <div class="clear"></div> -->
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						<?php
						}
						?>
						<!-- <div class="gallery">
						
							<ul>
								<li>
									<a href="assets/images/info/event-1.png" class="without-caption image-link">
										<figure>
											<img src="{{asset('assets/images/info/event-1.png')}}">
										</figure>
									</a>
									
								</li>
								<li>
									<a href="assets/images/info/event-2.png" class="without-caption image-link">
										<figure>
											<img src="{{asset('assets/images/info/event-1.png')}}">
										</figure>
									</a>
								</li>
								<li>
									<a href="assets/images/info/event-3.png" class="without-caption image-link">
										<figure>
											<img src="{{asset('assets/images/info/event-1.png')}}">
										</figure>
									</a>
								</li>
							</ul>
						</div> -->

					</div>
					<div class="col-md-4">
						<aside class="content-side sticky-top">
							<div class="">
								<div class="card-side">
									<p class="title">{{__('jelajah.lainnya')}}</p>
									@foreach($beritas as $berita)
									<div class="mb-4">
										<div class="d-flex">
											<figure>
												<a href="{{ route('jelajah.main') }}/{{$berita->id}}/detail"><img src="{{ asset('images/article'.'/'.$berita->photo) }}"></a>
											</figure>
											<div class="content">
												<a href="{{ route('jelajah.main') }}/{{$berita->id}}/detail">
													<p class="title">{{$berita->title}}</p>
												</a>
												<p class="date">{{$berita->created_at}}</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</aside>
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
				// type: 'loop',
				perPage: 3,
				focus: 'center',
				autoWidth: true,
			});

			splide.mount();
		});
	</script>

	<script>
		$(document).ready(function() {
			$('.image-popup-vertical-fit').magnificPopup({
				type: 'image',
				mainClass: 'mfp-with-zoom',
				gallery: {
					enabled: true
				},

				zoom: {
					enabled: true,

					duration: 300, // duration of the effect, in milliseconds
					easing: 'ease-in-out', // CSS transition easing function

					opener: function(openerElement) {

						return openerElement.is('img') ? openerElement : openerElement.find('img');
					}
				}

			});
		});



		$('.without-caption').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300 // don't foget to change the duration also in CSS
			}
		});

		$('.with-caption').magnificPopup({
			type: 'image',
			closeOnContentClick: true,
			closeBtnInside: false,
			mainClass: 'mfp-with-zoom mfp-img-mobile',
			image: {
				verticalFit: true,
				titleSrc: function(item) {
					return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
				}
			},
			zoom: {
				enabled: true
			}
		});
	</script>

</body>

</html>