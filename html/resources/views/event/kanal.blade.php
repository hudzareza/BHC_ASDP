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
					<p class="title">{{__('navbar.event')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('event.main')}}">{{__('navbar.event')}}</a></li>
							<li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page">
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
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">
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
				<?php
				$beritas = json_decode(json_encode($beritas), true);
				if (empty($beritas)) {
				?>
					<div class="list" style="text-align: center;">
						<img style="width:190px;height:190px;margin-bottom:15px;margin-top:80px;" src="{{asset('assets/images/nodata.png')}}" alt="">
						<h4>
							<p>{{__('event.nodata')}}</p>
						</h4>
					</div>
				<?php
				} else {
				?>
					<div class="list">
						<ul class="list-content">
							@foreach($beritas as $list)
							<li>
								<div class="card-2">
									<div class="inner-card-2">

										<figure>
											<a href="{{ route('event.main') }}/{{$list['id']}}/detail">
												<img src="{{ asset('images/article'.'/'.$list['photo']) }}">
											</a>
										</figure>

										<a href="{{ route('event.main') }}/{{$list['id']}}/detail">
											<p class="title">{{$list['title']}}</p>
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