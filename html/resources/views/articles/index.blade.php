<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>
	<style>
		.splide__slide img {
			width: 100%;
			height: auto;
		}
	</style>
	@include('shared.navbar')

	<main>

		<section class="hm_1" style="position: static !important;height:unset;">
			<section id="image-carousel" class="splide" aria-label="Beautiful Images">
				<div class="splide__track">
					<ul class="splide__list">
						@foreach($banner as $slide)
						<li class="splide__slide" data-splide-interval="2000">
							<img src="{{ asset('images/article/'.$slide->photo) }}" alt="">
						</li>
						@endforeach
					</ul>
				</div>
			</section>
			<!-- <div class="main-banner">
				<img src="assets/images/banner/bhc_51.png">
			</div> -->
			<style>
				@media only screen and (max-width: 600px) {
					.beli-tiket {
						margin-left: 0% !important;
					}
				}
			</style>
			<div style="position:static;margin-left:50%;" class="beli-tiket">
				<p>
					{{ __('home.beli_tiket') }}


					<a href="{{ route('tiket.promo.main') }}">
						{{ __('home.btn_beli_tiket') }}


					</a>
				</p>
			</div>
		</section>

		<section class="hm_2">
			<div class="container">
				<div class="text-center">
					<p class="title">
						{{ __('home.welcome') }}


					</p>
					<h1>
						<p class="notranslate">
							Bakauheni Harbour City
						</p>
					</h1>
				</div>
			</div>
		</section>

		<section class="hm_3">
			<div class="container">
				<?php
				if (empty($data['main'])) {
					// print_r($beritas);die();
				?>
					<div class="list" style="text-align: center;">
						<img style="width:190px;height:190px;margin-bottom:15px;margin-top:20px;" src="{{asset('assets/images/nodata.png')}}" alt="">
						<h4>
							<p>
								{{ __('event.nodata') }}


							</p>
						</h4>
					</div>
				<?php
				} else {
				?>
					<div class="list text-center">
						<ul class="list-content">

							@foreach ($data['main'] as $post)
							<?php
							// print_r($post);die();
							?>
							<li>
								<div class="card-1" style="background-image: url('{{ asset('images/article/'.$post->photo) }}');">
									<div class="inner-card-1">
										<div class="dark-transparent"></div>
										<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g id="pin-drop">
												<path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M8.49984 26.6665H24.4998C25.2332 26.6665 25.8332 27.2665 25.8332 27.9998C25.8332 28.7332 25.2332 29.3332 24.4998 29.3332H8.49984C7.7665 29.3332 7.1665 28.7332 7.1665 27.9998C7.1665 27.2665 7.7665 26.6665 8.49984 26.6665ZM16.4998 9.33317C15.0332 9.33317 13.8332 10.5332 13.8332 11.9998C13.8332 13.4665 15.0332 14.6665 16.4998 14.6665C17.2071 14.6665 17.8854 14.3856 18.3855 13.8855C18.8856 13.3854 19.1665 12.7071 19.1665 11.9998C19.1665 11.2926 18.8856 10.6143 18.3855 10.1142C17.8854 9.61412 17.2071 9.33317 16.4998 9.33317ZM16.4998 2.6665C20.8598 2.6665 25.8332 5.9465 25.8332 12.1998C25.8332 16.1732 22.9932 20.3598 17.3132 24.7198C16.8332 25.0932 16.1665 25.0932 15.6865 24.7198C10.0065 20.3465 7.1665 16.1732 7.1665 12.1998C7.1665 5.9465 12.1398 2.6665 16.4998 2.6665Z" fill="white" />
											</g>
										</svg>

										<p>
											{{ $post->title }}
										</p>

										<a href="{{ route('jelajah.main') }}/{{$post->id}}/detail" class="">
											{{ __('home.btn_jelajah') }}


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

		<section class="hm_4">
			<div class="container">
				<div class="info-bhc">
					<p>
						{{ __('home.info_bhc') }}


					</p>
					<div class="d-flex m-block">
						<div class="subtitle">
							<p>
								{{ __('home.info_bhc_desc') }}


							</p>
						</div>
						<div class="lihatsemua">
							<a href="{{ asset('info') }}">
								{{ __('home.btn_lihat_info') }}


							</a>
						</div>
					</div>
				</div>
				<?php
				if (empty($data['info'])) {
					// print_r($beritas);die();
				?>
					<div class="list" style="text-align: center;">
						<img style="width:190px;height:190px;margin-bottom:15px;margin-top:20px;" src="{{asset('assets/images/nodata.png')}}" alt="">
						<h4>
							<p>
								{{ __('event.nodata') }}


							</p>
						</h4>
					</div>
				<?php
				} else {
				?>
					<style>
						.splide__pagination {
							margin-top: 15px;
							display: flex !important;
							position: relative !important;
						}
					</style>
					<!-- <div class="list" style="display: grid;grid-template-columns: repeat(3, 1fr);gap: 20px;"> -->
					<div class="container splide" id="splide-carousel" aria-label="Splide Basic HTML Example">
						<div class="splide__track">
							<ul class="list-content splide__list">
								@foreach($data['info'] as $list)
								<li class="splide__slide">
									<div class="card-2" style="box-shadow:unset !important;">
										<div class="inner-card-2">

											<figure>
												<img src="{{ asset('images/article'.'/'.$list->photo) }}">
											</figure>
											<p style="height: 52px;" class="title">
												<?php
												$counttitle = strlen($list->title);
												if ($counttitle > 50) {
												?>
													{{substr($list->title,0,50)}}...
												<?php
												} else {
												?>
													{{substr($list->title,0,50)}}
												<?php
												}
												?>
											</p>
											<p class="kategori" style="color:black;height: 52px;">
												<?php
												$countdesc = strlen($list->description);
												if ($countdesc > 50) {
												?>
													{{substr($list->description,0,60)}}...
												<?php
												} else {
												?>
													{{substr($list->description,0,60)}}
												<?php
												}
												?>
											</p>

											<p style="height: 82px;" class="desc">
												<?php
												$countcontent = strlen($list->content);
												if ($countcontent > 90) {
												?>
													{{ substr(strip_tags($list->content),0,100) }}...
												<?php
												} else {
												?>
													{{ substr(strip_tags($list->content),0,100) }}
												<?php
												}
												?>
											</p>

											<div class="selengkapnya">
												<a href="{{ route('info.main') }}/{{$list->id}}/detail">
													{{ __('home.btn_lihat_info') }}

												</a>
											</div>

										</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</section>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				// new Splide( '#image-carousel' ).mount();
				var splide = new Splide('#splide-carousel', {
					type: 'loop',
					perPage: 3,
					focus: 'center',
					autoplay: true,
					autoWidth: true,
					height: '100%',
					speed: 100,
					gap: '1rem',
					cover: true
				});

				splide.mount();
			});
		</script>
	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// new Splide( '#image-carousel' ).mount();
			new Splide('.splide', {
				type: 'loop',
				perPage: 1,
				arrows: true,
				dots: true,
				autoplay: true
			}).mount();
		});
	</script>
</body>

</html>