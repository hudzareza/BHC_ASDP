<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

    @include('shared.navbar')

    <main>
		
		<section class="content-error">
			
			<div class="container">
				<div class="row">
					<div class="col-md-7 m-auto morder-5">
						<div class="">
							<p class="error-green-1">Coming Soon</p>
							<p class="error-green-2">Emm, halaman Tiket Siger Park tidak ditemukan</p>
							<p class="error-green-3">Kami sarankan untuk pergi ke halaman Beranda</p>
							<a href="{{ asset('') }}" class="btn-black">Halaman Beranda</a>
						</div>
					</div>
					<div class="col-md-5 m-auto morder-1">
						<div class="m-mt-4">
							<img src="{{ asset('assets/images/404.png') }}" class="w-100">
						</div>
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