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
					<p class="title notranslate">FAQ</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('navbar.beranda') }}</a></li>
							<li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active notranslate" aria-current="page"><a href="{{route('faq.main')}}">FAQ</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">
				<div class="faq">
					<section class="py-4">
						<div class="container">
							<div class="row">
								<div class="col-md-10 mx-auto">
									<div class="accordion" id="accordionRental">
										@foreach($beritas as $list)
										<div class="accordion-item mb-3">
											<h5 class="accordion-header" id="headingOne{{$list->id}}">
												<button class="accordion-button border-bottom font-weight-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$list->id}}" aria-expanded="true" aria-controls="collapseOne{{$list->id}}">
													{{$list->question}}
													<i class="collapse-close fa fa-plus text-xs pt-1 position-absolute end-0"></i>
													<i class="collapse-open fa fa-minus text-xs pt-1 position-absolute end-0"></i>
												</button>
											</h5>
											<div id="collapseOne{{$list->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne{{$list->id}}" data-bs-parent="#accordionRental">
												<div class="accordion-body text-sm opacity-8">
													{!! nl2br(e(strip_tags($list->answer))) !!}
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>
	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')

	<script type="text/javascript">
		if (document.getElementById('typed')) {
			var typed = new Typed("#typed", {
				stringsElement: '#typed-strings',
				typeSpeed: 90,
				backSpeed: 90,
				backDelay: 200,
				startDelay: 500,
				loop: true
			});
		}
	</script>
</body>

</html>