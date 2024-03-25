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
					<p class="title">{{__('info.info')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('info.main')}}">{{__('info.info')}}</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="hm_4 mt-5">
			<div class="container">
				<?php
				if (empty($beritas)) {
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
						<ul class="list-content info-list-content">
							@foreach($beritas as $list)
							<li style="margin-bottom: 70px;">
								<div class="card-2">
									<div class="inner-card-2">

										<figure>
											<a href="{{ route('info.main') }}/{{$list->id}}/detail"><img src="{{ asset('images/article'.'/'.$list->photo) }}"></a>
										</figure>

										<p class="title" style="height: 52px;">
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

										<a href="{{ route('info.main') }}/{{$list->id}}/detail">
											<p class="description" style="color:black;height: 52px;">
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
										</a>

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
											<!-- {!! $list->content !!} -->
										</p>

										<div class="selengkapnya">
											<a href="{{ route('info.main') }}/{{$list->id}}/detail">
												{{__('info.btn_selengkapnya')}}
											</a>
										</div>

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