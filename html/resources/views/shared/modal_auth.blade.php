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
						<input type="email" class="form-control @error('email') is-invalid @enderror notranslate" id="email" name="email" value="{{ old('email') }}" placeholder="{{__('login.email')}}">
					</div>
					<div class="mb-4">
						<input type="password" class="form-control @error('password') is-invalid @enderror notranslate" id="email" name="password" placeholder="{{__('login.password')}}">
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
				<form action="{{ route('store') }}" method="post">
					@csrf
					<div class="mb-4">
						<input type="text" class="form-control @error('name') is-invalid @enderror notranslate" id="email" name="name" value="{{ old('name') }}" placeholder="{{__('login.username')}}">
						@if ($errors->has('name'))
						<span class="text-danger">{{ $errors->first('name') }}</span>
						@endif
					</div>
					<div class="mb-4">
						<input type="email" class="form-control @error('email') is-invalid @enderror notranslate" id="email" name="email" value="{{ old('email') }}" placeholder="{{__('login.email')}}">
						@if ($errors->has('email'))
						<span class="text-danger notranslate">{{ $errors->first('email') }}</span>
						@endif
					</div>
					<div class="mb-4">
						<input type="password" class="form-control @error('password') is-invalid @enderror notranslate" id="name" name="password" placeholder="{{__('login.password')}}">
						@if ($errors->has('password'))
						<span class="text-danger">{{ $errors->first('password') }}</span>
						@endif
					</div>
					<div class="mb-4">
						<button class="btn btn-success w-100" type="submit">{{__('login.submit_register')}}</button>
					</div>
				</form>
				<p class="text-center">
					{{__('login.keterangan_daftar')}} <a role="button" class="akunlink notranslate" data-bs-toggle="modal" data-bs-target="#modallogin"> {{__('login.header_login')}}</a>
				</p>
			</div>
		</div>
	</div>
</div>