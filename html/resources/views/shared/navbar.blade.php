<style>
	.dropdown:hover>.dropdown-menu {
		display: block;
	}

	.dropdown>.dropdown-toggle:active {
		/*Without this, clicking will make it sticky*/
		pointer-events: none;
	}
</style>
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
	<div class="container">
		<a class="navbar-brand" href="{{ asset('') }}">
			<img src="{{ asset('assets/images/logo-bhc.png') }}" class="logo-header">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mb-2 mb-md-0">
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="{{ route('home') }}">
						{{ __('navbar.beranda') }}
						<!-- Beranda -->
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="{{ route('event.main') }}">
						{{ __('navbar.event') }}
						<!-- Kalender Acara -->
					</a>
				</li>
				<li class="nav-item dropdown">
					<div class="dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
							{{ __('navbar.jelajah') }}

							<!-- Jelajah BHC -->
							<img src="{{ asset('assets/images/keyboard-arrow-down.svg') }}">
						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="min-width: fit-content;">
							<?
							$kode = app()->getLocale();
							?>
							@foreach(App\Models\Article::where('approved',"1")->where('kode',$kode)->get() as $menu)
							<li><a class="dropdown-item" href="{{ route('jelajah.main') }}/{{$menu->id}}/detail">{{ucwords($menu->title)}}</a></li>
							@endforeach
						</ul>
					</div>
				</li>
				<style>
					@media only screen and (min-width: 600px) {

						/* #arralt{
								margin-left: -14px;
							} */
						.dropdown-menu {
							width: 300px !important;
						}

						#drops {
							transform: translate(-36%, 0) !important;
						}
					}

					@media only screen and (max-width: 600px) {
						.dropdown-menu {
							width: 300px !important;
						}

						#drops {
							transform: translate(-36%, 0) !important;
						}
					}

					@media only screen and (max-width: 455px) {
						#inline {
							width: 431px !important;
						}

						#drops {
							transform: translate(-36%, 0) !important;
						}
					}
				</style>
				<li class="row nav-item dropdown">
					<!-- <div class="row"> -->
					<div id="inline" style="display:inline-flex;">
						<a class="nav-link" href="{{ route('tiket.promo.main') }}">
							{{ __('navbar.tiket_promo') }}
							<!-- Tiket & Promo -->
						</a>
						<div id="arralt" class="dropdown">
							<img class="nav-link dropdown-toggle" src="{{ asset('assets/images/keyboard-arrow-down.svg') }}">
							<ul id="drops" class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('tiket.detail') }}">
										<div class="notranslate">Krakatau Park</div>
									</a></li>
								<li><a class="dropdown-item" href="{{ route('tiket.soon') }}">
										<div class="notranslate">Siger Park</div>
									</a></li>
								@foreach(App\Models\Ticket::where('approved',"1")->get() as $list)
								<li><a class="dropdown-item" href="{{$list->url}}">
										<div class="notranslate">{{ucwords($list->name)}}</div>
									</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<!-- </div>	 -->
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="{{ route('kontak.main') }}">
						{{ __('navbar.kontak') }}
						<!-- Kontak -->
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="{{ route('faq.main') }}">
						<div class="notranslate">
							{{ __('navbar.faq') }}

							<!-- FAQ -->
						</div>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
						{{ __('navbar.bahasa') }}

						<!-- Bahasa -->
						<img src="{{ asset('assets/images/keyboard-arrow-down.svg') }}">
					</a>
					<ul class="dropdown-menu">
						@foreach(App\Models\Language::all() as $bahasa)
						<li><a class="dropdown-item" href="{{ route('locale', $bahasa->kode) }}">{{$bahasa->name}}</a></li>
						@endforeach
					</ul>
				</li>
			</ul>
			@guest
			<div class="d-flex" role="search">
				<a role="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modallogin">
					<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="icon">
							<path id="Vector" d="M9 2C4.86 2 1.5 5.36 1.5 9.5C1.5 13.64 4.86 17 9 17C13.14 17 16.5 13.64 16.5 9.5C16.5 5.36 13.14 2 9 2ZM9 4.25C10.245 4.25 11.25 5.255 11.25 6.5C11.25 7.745 10.245 8.75 9 8.75C7.755 8.75 6.75 7.745 6.75 6.5C6.75 5.255 7.755 4.25 9 4.25ZM9 14.9C7.125 14.9 5.4675 13.94 4.5 12.485C4.5225 10.9925 7.5 10.175 9 10.175C10.4925 10.175 13.4775 10.9925 13.5 12.485C12.5325 13.94 10.875 14.9 9 14.9Z" fill="white" />
						</g>
					</svg>
					{{ __('navbar.masuk') }}

					<!-- Masuk -->
				</a>
			</div>
			@else
			<div class="nav-item dropdown">
				<a class="btn btn-success" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g id="icon">
							<path id="Vector" d="M9 2C4.86 2 1.5 5.36 1.5 9.5C1.5 13.64 4.86 17 9 17C13.14 17 16.5 13.64 16.5 9.5C16.5 5.36 13.14 2 9 2ZM9 4.25C10.245 4.25 11.25 5.255 11.25 6.5C11.25 7.745 10.245 8.75 9 8.75C7.755 8.75 6.75 7.745 6.75 6.5C6.75 5.255 7.755 4.25 9 4.25ZM9 14.9C7.125 14.9 5.4675 13.94 4.5 12.485C4.5225 10.9925 7.5 10.175 9 10.175C10.4925 10.175 13.4775 10.9925 13.5 12.485C12.5325 13.94 10.875 14.9 9 14.9Z" fill="white" />
						</g>
					</svg>
					{{ Auth::user()->name }}
				</a>
				<ul class="dropdown-menu">
					<li>
						<a class="dropdown-item" href="{{ route('profil.main') }}">Profile</a>
					</li>
					<li>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST">
							@csrf
						</form>
					</li>
				</ul>
			</div>
			@endif
		</div>
	</div>
</nav>
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
	{{ session()->get('error') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif