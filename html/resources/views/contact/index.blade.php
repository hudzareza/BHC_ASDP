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
					<p class="title">{{__('navbar.kontak')}}</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('navbar.beranda')}}</a></li>
							<li class="breadcrumb-item"><img src="assets/images/arrow-right.png"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('kontak.main')}}">{{__('navbar.kontak')}}</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<section class="k_e_2">
			<div class="container">

				<div class="list-kontak mt-5">
					<ul>
						<li>
							<div class="text-center">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="email">
										<path id="Vector" d="M29.3332 7.99992C29.3332 6.53325 28.1332 5.33325 26.6665 5.33325H5.33317C3.8665 5.33325 2.6665 6.53325 2.6665 7.99992V23.9999C2.6665 25.4666 3.8665 26.6666 5.33317 26.6666H26.6665C28.1332 26.6666 29.3332 25.4666 29.3332 23.9999V7.99992ZM26.6665 7.99992L15.9998 14.6666L5.33317 7.99992H26.6665ZM26.6665 23.9999H5.33317V10.6666L15.9998 17.3333L26.6665 10.6666V23.9999Z" fill="#151515" />
									</g>
								</svg>
								<p>
									<strong>{{__('kontak.customer')}} </strong> <br>
									<a href="mailto:cs@bakauheniharbourcity.com">{{__('footer.email')}}</a>
								</p>
								<!-- <p>
									<strong>Marketing and Sales:</strong> <br>
									<a href="mailto:sales@bakauheniharbourcity.com">sales@bakauheniharbourcity.com</a>
								</p> -->
							</div>
						</li>
						<li>
							<div class="text-center">
								<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="ic:baseline-whatsapp">
										<path id="Vector" d="M25.4001 7.04658C24.1777 5.81182 22.7216 4.83281 21.1169 4.16665C19.5122 3.5005 17.7909 3.16053 16.0534 3.16658C8.7734 3.16658 2.84007 9.09992 2.84007 16.3799C2.84007 18.7132 3.4534 20.9799 4.60007 22.9799L2.7334 29.8333L9.7334 27.9933C11.6667 29.0466 13.8401 29.6066 16.0534 29.6066C23.3334 29.6066 29.2667 23.6733 29.2667 16.3932C29.2667 12.8599 27.8934 9.53992 25.4001 7.04658ZM16.0534 27.3666C14.0801 27.3666 12.1467 26.8333 10.4534 25.8333L10.0534 25.5933L5.8934 26.6866L7.00006 22.6333L6.7334 22.2199C5.63706 20.4692 5.05492 18.4456 5.0534 16.3799C5.0534 10.3266 9.98673 5.39325 16.0401 5.39325C18.9734 5.39325 21.7334 6.53992 23.8001 8.61992C24.8234 9.63854 25.6343 10.8501 26.1859 12.1845C26.7375 13.5188 27.0188 14.9494 27.0134 16.3932C27.0401 22.4466 22.1067 27.3666 16.0534 27.3666ZM22.0801 19.1532C21.7467 18.9932 20.1201 18.1933 19.8267 18.0732C19.5201 17.9666 19.3067 17.9132 19.0801 18.2332C18.8534 18.5666 18.2267 19.3132 18.0401 19.5266C17.8534 19.7533 17.6534 19.7799 17.3201 19.6066C16.9867 19.4466 15.9201 19.0866 14.6667 17.9666C13.6801 17.0866 13.0267 16.0066 12.8267 15.6733C12.6401 15.3399 12.8001 15.1666 12.9734 14.9932C13.1201 14.8466 13.3067 14.6066 13.4667 14.4199C13.6267 14.2332 13.6934 14.0866 13.8001 13.8732C13.9067 13.6466 13.8534 13.4599 13.7734 13.2999C13.6934 13.1399 13.0267 11.5133 12.7601 10.8466C12.4934 10.2066 12.2134 10.2866 12.0134 10.2733H11.3734C11.1467 10.2733 10.8001 10.3533 10.4934 10.6866C10.2001 11.0199 9.34673 11.8199 9.34673 13.4466C9.34673 15.0733 10.5334 16.6466 10.6934 16.8599C10.8534 17.0866 13.0267 20.4199 16.3334 21.8466C17.1201 22.1933 17.7334 22.3933 18.2134 22.5399C19.0001 22.7933 19.7201 22.7532 20.2934 22.6732C20.9334 22.5799 22.2534 21.8732 22.5201 21.0999C22.8001 20.3266 22.8001 19.6733 22.7067 19.5266C22.6134 19.3799 22.4134 19.3132 22.0801 19.1532Z" fill="black" />
									</g>
								</svg>
								<p>
									<strong style="margin: 12px 0px;">{{__('kontak.whatsapp')}}</strong> <br>
									<a href="https://wa.link/eqayy5" data-action="share/whatsapp/share" target="_blank" class="listside">{{__('footer.whatsapp')}}</a>
								</p>
							</div>
						</li>
						<li>
							<div class="text-center">
								<svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="alternate-email">
										<path id="Vector" d="M17.4599 3.20659C9.33993 2.63326 2.63326 9.33993 3.20659 17.4599C3.68659 24.5133 9.84659 29.8333 16.9133 29.8333H21.8333C22.5666 29.8333 23.1666 29.2333 23.1666 28.4999C23.1666 27.7666 22.5666 27.1666 21.8333 27.1666H16.9399C11.9666 27.1666 7.40659 23.9399 6.16659 19.1266C4.17993 11.3933 11.3799 4.17993 19.1133 6.17993C23.9399 7.40659 27.1666 11.9666 27.1666 16.9399V18.4066C27.1666 19.4599 26.2199 20.4999 25.1666 20.4999C24.1133 20.4999 23.1666 19.4599 23.1666 18.4066V16.7399C23.1666 13.3933 20.7933 10.3799 17.4866 9.91326C12.9533 9.25993 9.12659 13.1799 9.93993 17.7399C10.3933 20.2866 12.3799 22.3933 14.8999 22.9933C17.3533 23.5666 19.6866 22.7799 21.2199 21.2199C22.4066 22.8466 24.7799 23.6999 26.9533 22.8333C28.7399 22.1266 29.8333 20.2999 29.8333 18.3799V16.9266C29.8333 9.84659 24.5133 3.68659 17.4599 3.20659ZM16.4999 20.4999C14.2866 20.4999 12.4999 18.7133 12.4999 16.4999C12.4999 14.2866 14.2866 12.4999 16.4999 12.4999C18.7133 12.4999 20.4999 14.2866 20.4999 16.4999C20.4999 18.7133 18.7133 20.4999 16.4999 20.4999Z" fill="#151515" />
									</g>
								</svg>
								<p>
									<strong style="margin: 12px 0px;">{{__('kontak.social')}}</strong> <br>
								<ul class="vertical">
									<li>
										<a href="https://www.instagram.com/bakauheni.harbour.city?igsh=b3pmZGlyb29rNGRy">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g id="instagram">
													<path id="Vector" d="M17.5 6.5H17.51M7 2H17C19.7614 2 22 4.23858 22 7V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V7C2 4.23858 4.23858 2 7 2ZM16 11.37C16.1234 12.2022 15.9813 13.0522 15.5938 13.799C15.2063 14.5458 14.5932 15.1514 13.8416 15.5297C13.0901 15.9079 12.2385 16.0396 11.4078 15.9059C10.5771 15.7723 9.80977 15.3801 9.21485 14.7852C8.61993 14.1902 8.22774 13.4229 8.09408 12.5922C7.96042 11.7615 8.09208 10.9099 8.47034 10.1584C8.8486 9.40685 9.4542 8.79374 10.201 8.40624C10.9478 8.01874 11.7978 7.87658 12.63 8C13.4789 8.12588 14.2649 8.52146 14.8717 9.1283C15.4785 9.73515 15.8741 10.5211 16 11.37Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
												</g>
											</svg>
										</a>
									</li>
									<li>
										<a href="https://www.tiktok.com/@bhc.id?_t=8iwNtn8FioE&_r=1">
											<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g id="ic:baseline-tiktok">
													<path id="Vector" d="M16.6002 5.82C15.9166 5.03962 15.5399 4.03743 15.5402 3H12.4502V15.4C12.4263 16.071 12.143 16.7066 11.6599 17.1729C11.1768 17.6393 10.5316 17.8999 9.86016 17.9C8.44016 17.9 7.26016 16.74 7.26016 15.3C7.26016 13.58 8.92016 12.29 10.6302 12.82V9.66C7.18016 9.2 4.16016 11.88 4.16016 15.3C4.16016 18.63 6.92016 21 9.85016 21C12.9902 21 15.5402 18.45 15.5402 15.3V9.01C16.7932 9.90985 18.2975 10.3926 19.8402 10.39V7.3C19.8402 7.3 17.9602 7.39 16.6002 5.82Z" fill="black" />
												</g>
											</svg>
										</a>
									</li>
								</ul>
								</p>
							</div>
						</li>
					</ul>
				</div>

				<div class="info-bhc">
					<p>{{__('kontak.kontak_kami')}}</p>
					<p class="text-center desc-kontak">{{__('kontak.deskripsi')}}</p>
					<form class="form-kontak" method="POST" action="{{route('kontak.store')}}">
						@csrf
						<div class="row">
							<div class="col-md-6 mb-3">
								<label>{{__('kontak.nama_lengkap')}}</label>
								<input name="name" type="text" class="form-control" placeholder="{{__('kontak.nama_lengkap')}}" aria-label="First name">
							</div>
							<div class="col-md-6 mb-3">
								<label class="notranslate">{{__('kontak.email')}}</label>
								<input name="email" type="text" class="form-control notranslate" placeholder="{{__('kontak.email')}}" aria-label="Last name">
							</div>
							<div class="col-md-12 mb-3">
								<label>{{__('kontak.bantuan')}}</label>
								<textarea name="content" class="form-control" rows="5" placeholder=""></textarea>
							</div>
							<div class="text-center">
								<button class="btn-green">{{__('kontak.btn_kirim')}}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</main>

	@include('shared.footer')
	@include('shared.modal_auth')
	@include('shared.script')

</body>

</html>