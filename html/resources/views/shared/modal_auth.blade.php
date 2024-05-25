<!-- Modal Login -->
<div class="modal fade" id="modallogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<h1 class="modal-title fs-5 mb-3 text-center notranslate" id="staticBackdropLabel">{{__('login.header_login')}}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<form action="{{ route('authenticate') }}" method="post">
					@csrf
					<div class="mb-4">
						<input type="email" class="form-control @error('email') is-invalid @enderror notranslate" name="email" value="{{ old('email') }}" placeholder="{{__('login.email')}}">
					</div>
					<div class="mb-4">
						<input type="password" class="form-control @error('password') is-invalid @enderror notranslate" name="password" placeholder="{{__('login.password')}}">
					</div>
					<div class="mb-4">
						<button class="btn btn-success w-100 notranslate" type="submit">{{__('login.submit_login')}}</button>
					</div>
				</form>
				<p class="text-center">
					{{__('login.keterangan_masuk')}} <a role="button" class="akunlink" data-bs-toggle="modal" data-bs-target="#modalregister"> {{__('login.header_register')}}</a>
				</p>
			</div>
		</div>
	</div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="modalregister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<h1 class="modal-title fs-5 mb-3 text-center" id="staticBackdropLabel">{{__('login.header_register')}}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<form id="form" action="{{ route('store') }}" method="post">
					@csrf
					<div class="mb-4">
						<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{__('login.username')}}">

					</div>
					<div class="mb-4">
						<input type="email" class="form-control" id="surel" name="email" placeholder="{{__('login.email')}}">

					</div>
					<div class="mb-4">
						<input type="password" class="form-control" name="password" placeholder="{{__('login.password')}}">

					</div>
				</form>
				<div class="mb-4">
					<button class="btn btn-success w-100" type="submit" type="submit" id="submitBtn">{{__('login.submit_register')}}</button>
				</div>
				<p class="text-center">
					{{__('login.keterangan_daftar')}} <a role="button" class="akunlink notranslate" data-bs-toggle="modal" data-bs-target="#modallogin"> {{__('login.header_login')}}</a>
				</p>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$(this).on('click', '#submitBtn', function(e) {
			e.preventDefault();

			var isEmptyName = false;
			var isEmptyEmail = false;
			var isEmptyPassword = false;

			var inputs1 = $('#form input[name="name"]');

			inputs1.each(function() {
				// Memeriksa apakah input teks, nomor, atau email kosong
				if ($(this).val() === '') {
					isEmptyName = true;
					// Menampilkan pesan error di samping input yang kosong
					$(this).addClass('is-invalid');
					$(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">This field cannot be empty.</div>');
				} else {
					$(this).removeClass('is-invalid');
					$(this).parent().find('.invalid-feedback').remove();
				}

			});

			// Memeriksa setiap input dalam form
			var inputs2 = $('#form input[name="email"]');

			inputs2.each(function() {
				// Memeriksa apakah input teks, nomor, atau email kosong
				if ($(this).val() === '') {
					isEmptyEmail = true;
					// Menampilkan pesan error di samping input yang kosong
					$(this).addClass('is-invalid');
					$(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">This field cannot be empty.</div>');
				} else {
					$(this).removeClass('is-invalid');
					$(this).parent().find('.invalid-feedback').remove();
				}

			});

			// Memeriksa setiap input dalam form
			var inputs3 = $('#form input[name="password"]');

			inputs3.each(function() {
				// Memeriksa apakah input teks, nomor, atau email kosong
				if ($(this).val() === '') {
					isEmptyPassword = true;
					// Menampilkan pesan error di samping input yang kosong
					$(this).addClass('is-invalid');
					$(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">This field cannot be empty.</div>');
				} else {
					$(this).removeClass('is-invalid');
					$(this).parent().find('.invalid-feedback').remove();
				}

			});

			// Jika ada input yang kosong, hentikan proses pengiriman formulir
			if (isEmptyName === true || isEmptyEmail === true || isEmptyPassword === true) {
				return false;
			} else {
				// Jika semua input sudah diisi, kirim formulir
				submitForm();
			}
		});

		$('#surel').on('keyup', function() {
			var email = $(this).val();

			$.ajax({
				url: "{{ route('cek-email') }}",
				method: 'POST',
				data: {
					email: email,
					_token: '{{ csrf_token() }}'
				},
				success: function(response) {
					// console.log(response);
					if (response.exists) {
						// Jika email sudah ada, tampilkan pesan kesalahan
						$('#surel').addClass('is-invalid');
						$('#surel').parent().find('.invalid-feedback').remove();
						$('#surel').parent().append('<div class="invalid-feedback">Email has been registered.</div>');
						$('#submitBtn').attr('disabled', true);
					} else {
						// Jika email belum ada, hapus pesan kesalahan (jika ada)
						$('#surel').removeClass('is-invalid');
						$('#surel').parent().find('.invalid-feedback').remove();
						$('#submitBtn').removeAttr('disabled');
					}
				}
			});
		});
	});

	async function submitForm() {
		$('#form').submit();
	}
</script>