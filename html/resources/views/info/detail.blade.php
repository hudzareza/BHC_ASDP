<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

	@include('shared.navbar')

	<main>

		<section class="k_e_1">
			<div class="main-banner" style="background: url('{{ asset('assets/images/banner/bhc_51.png') }}')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">{{__('info.info')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="{{ asset('assets/images/arrow-right.png') }}"></li>
							<li class="breadcrumb-item"><a href="{{route('info.main')}}">{{__('info.info')}}</a></li>
							<li class="breadcrumb-item"><img src="{{ asset('assets/images/arrow-right.png') }}"></li>
							<li class="breadcrumb-item active notranslate" aria-current="page">{{__('info.detail')}}</li>
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
								<!-- {!! nl2br(e(html_entity_decode(strip_tags($data[0]->content)))) !!} -->
								{!! $data[0]->content !!}
							</p>
						</article>

						<div class="d-flex hidemobile">
							<div class="flex-fill">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="Keyboard arrow right" clip-path="url(#clip0_34_658)">
										<path id="Vector" d="M15.4099 16.59L10.8299 12L15.4099 7.41L13.9999 6L7.99991 12L13.9999 18L15.4099 16.59Z" fill="#001B3F" />
									</g>
									<defs>
										<clipPath id="clip0_34_658">
											<rect width="24" height="24" fill="white" transform="matrix(-1 0 0 1 24 0)" />
										</clipPath>
									</defs>
								</svg>

								<a href="{{ route('info.main') }}/{{$filteredSide[0]['id']}}/detail">{{$filteredSide[0]['title']}}</a>
							</div>
							<div class="flex-fill text-right">
								<a href="{{ route('info.main') }}/{{$filteredSide[1]['id']}}/detail">{{$filteredSide[1]['title']}}</a>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="Keyboard arrow right" clip-path="url(#clip0_34_78)">
										<path id="Vector" d="M8.59009 16.59L13.1701 12L8.59009 7.41L10.0001 6L16.0001 12L10.0001 18L8.59009 16.59Z" fill="#001B3F" />
									</g>
									<defs>
										<clipPath id="clip0_34_78">
											<rect width="24" height="24" fill="white" />
										</clipPath>
									</defs>
								</svg>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<aside class="content-side sticky-top">
							<div class="">
								<div class="card-side">
									<p class="title">{{__('info.lainnya')}}</p>
									@foreach($beritas as $berita)
									<div class="mb-4">
										<div class="d-flex">
											<figure>
												<a href="{{ route('info.main') }}/{{$berita->id}}/detail"><img src="{{ asset('images/article'.'/'.$berita->photo) }}"></a>
											</figure>
											<div class="content">
												<a href="{{ route('info.main') }}/{{$berita->id}}/detail">
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

</body>

</html>