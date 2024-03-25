<footer>

	<div class="container">
		<div class="row">
			<!-- <div class="col-md-12 mb-4">
					
				</div> -->
			<div class="col-md-4">
				<img src="{{ asset('assets/images/logo-bhc.png') }}" class="logo-footer mb-4">
				<p class="deskripsi">
					{{ __('footer.deskripsi') }}


				</p>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.942722920927!2d105.74541578885496!3d-5.863677399999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41750044f4abbf%3A0xd76cacc3628dbf23!2sBakauheni%20Harbour%20City!5e0!3m2!1sen!2sid!4v1698857373213!5m2!1sen!2sid" width="100%" height="222" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-md-2">
				<p class="title-menu">
					{{ __('footer.halaman') }}

				</p>
				<ul>
					<li>
						<a href="{{route('home')}}">
							{{ __('navbar.beranda') }}

						</a>
					</li>
					<li>
						<a href="{{ route('event.main') }}">
							{{ __('navbar.event') }}

						</a>
					</li>
					<li>
						<a href="{{ route('jelajah.main') }}">
							{{ __('navbar.jelajah') }}

						</a>
					</li>
					<li>
						<a href="{{ route('tiket.promo.main') }}">
							{{ __('navbar.tiket_promo') }}

						</a>
					</li>
					<li>
						<a href="{{ route('kontak.main') }}">
							{{ __('navbar.kontak') }}

						</a>
					</li>
					<li class="notranslate">
						<a href="{{ route('faq.main') }}">
							{{ __('navbar.faq') }}

						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-4">
				<p class="title-menu">
					{{ __('footer.kontak_kami') }}

				</p>
				<div class="row">
					<div class="col-md-1 icn">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="email">
								<path id="Vector" d="M22 6C22 4.9 21.1 4 20 4H4C2.9 4 2 4.9 2 6V18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6ZM20 6L12 11L4 6H20ZM20 18H4V8L12 13L20 8V18Z" fill="#151515" />
							</g>
						</svg>
					</div>
					<div class="col-md-11">
						<a href="mailto:bakauheniharbourcity@gmail.com" class="listside">
							{{ __('footer.email') }}

						</a>
						<!-- <a href="mailto:sales@bakauheniharbourcity.com" class="listside">sales@bakauheniharbourcity.com</a> -->
					</div>
				</div>

				<div class="row">
					<div class="col-md-1 icn">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="ic:baseline-whatsapp">
								<path id="Vector" d="M19.0498 4.91006C18.133 3.98399 17.041 3.24973 15.8374 2.75011C14.6339 2.25049 13.3429 1.99552 12.0398 2.00006C6.5798 2.00006 2.1298 6.45006 2.1298 11.9101C2.1298 13.6601 2.5898 15.3601 3.4498 16.8601L2.0498 22.0001L7.2998 20.6201C8.7498 21.4101 10.3798 21.8301 12.0398 21.8301C17.4998 21.8301 21.9498 17.3801 21.9498 11.9201C21.9498 9.27006 20.9198 6.78006 19.0498 4.91006ZM12.0398 20.1501C10.5598 20.1501 9.1098 19.7501 7.8398 19.0001L7.5398 18.8201L4.4198 19.6401L5.2498 16.6001L5.0498 16.2901C4.22755 14.977 3.79094 13.4593 3.7898 11.9101C3.7898 7.37006 7.4898 3.67006 12.0298 3.67006C14.2298 3.67006 16.2998 4.53006 17.8498 6.09006C18.6173 6.85402 19.2255 7.76272 19.6392 8.76348C20.0529 9.76425 20.2638 10.8372 20.2598 11.9201C20.2798 16.4601 16.5798 20.1501 12.0398 20.1501ZM16.5598 13.9901C16.3098 13.8701 15.0898 13.2701 14.8698 13.1801C14.6398 13.1001 14.4798 13.0601 14.3098 13.3001C14.1398 13.5501 13.6698 14.1101 13.5298 14.2701C13.3898 14.4401 13.2398 14.4601 12.9898 14.3301C12.7398 14.2101 11.9398 13.9401 10.9998 13.1001C10.2598 12.4401 9.7698 11.6301 9.6198 11.3801C9.4798 11.1301 9.5998 11.0001 9.7298 10.8701C9.8398 10.7601 9.9798 10.5801 10.0998 10.4401C10.2198 10.3001 10.2698 10.1901 10.3498 10.0301C10.4298 9.86006 10.3898 9.72006 10.3298 9.60006C10.2698 9.48006 9.7698 8.26006 9.5698 7.76006C9.3698 7.28006 9.1598 7.34006 9.0098 7.33006H8.5298C8.3598 7.33006 8.0998 7.39006 7.8698 7.64006C7.6498 7.89006 7.0098 8.49006 7.0098 9.71006C7.0098 10.9301 7.89981 12.1101 8.0198 12.2701C8.1398 12.4401 9.7698 14.9401 12.2498 16.0101C12.8398 16.2701 13.2998 16.4201 13.6598 16.5301C14.2498 16.7201 14.7898 16.6901 15.2198 16.6301C15.6998 16.5601 16.6898 16.0301 16.8898 15.4501C17.0998 14.8701 17.0998 14.3801 17.0298 14.2701C16.9598 14.1601 16.8098 14.1101 16.5598 13.9901Z" fill="black" />
							</g>
						</svg>
					</div>
					<div class="col-md-11">
						<a href="https://wa.link/eqayy5" data-action="share/whatsapp/share" target="_blank" class="listside">
							{{ __('footer.whatsapp') }}

						</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<p class="title-menu">
					{{ __('footer.ikuti_kami') }}

				</p>
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
			</div>
		</div>
	</div>
	<div class="copyright">
		<p>
			{{ __('footer.hak_cipta') }}
		</p>
	</div>
</footer>