<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

	<main style="background-color: #F8F9FC;">
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
		<section class="k_e_2">
			<div class="container">
				<div class="info-bhc">
                    <div class="row">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h1 class="modal-title fs-5 mb-3 text-center" id="staticBackdropLabel">Login Admin BHC</h1>
                                    <form action="{{ route('authenticate.admin') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror notranslate" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="email" name="password" placeholder="Password">
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-success w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>            
				</div>
			</div>
		</section>
	</main>

    
    @include('shared.script')

</body>

</html>
