<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

    @include('shared.navbar')

	<main style="background-color: #F8F9FC;">
		
		<section class="k_e_1">
			<div class="main-banner" style="background: url('{{url('assets/images/banner/bhc_51.png')}}')">
				<div class="dark-transparent"></div>
				<div class="inner_k_e_1">
					<p class="title">Profile</p>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumbs">
							<li class="breadcrumb-item"><a href="{{route('home')}}">Beranda</a></li>
							<li class="breadcrumb-item"><img src="{{url('assets/images/arrow-right.png')}}"></li>
							<li class="breadcrumb-item active" aria-current="page"><a href="{{route('profil.main')}}">Profile</a></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

        

		<section class="k_e_2">
			<div class="container">
				<div class="info-bhc">
                    <div class="row">
                        <!-- <div class="col-md-2"></div> -->
                        <div class="col-md-5 order-md-2 card p-2">
                            <form action="{{route('profil.pass.store')}}" method="POST">
                                @csrf
                                <ul class="list-group">
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed"><p class="desc-kontak" style="text-align:left !important;"><b>Informasi</b></p></li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>Password Lama</label>
                                            <input placeholder="********" type="password" class="form-control" aria-label="First name" name="password">
                                        </div>
                                    </li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>Password Baru</label>
                                            <input placeholder="********" type="password" class="form-control"  aria-label="Last name" name="new_password">
                                        </div>
                                    </li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>Konfirmasi Password</label>
                                            <input placeholder="********" type="password" class="form-control" aria-label="Last name" id="password_confirmation" name="password_confirmation">
                                        </div>
                                    </li>
                                    <input value="{{ encrypt(Auth::user()->id) }}" type="hidden" class="form-control" aria-label="Last name" name="id">

                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4"><button style="float: right;" type="submit" class="btn-green" >Simpan</button></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="col-md-3 order-md-1">
                            <ul class="list-group mb-3">
                                <li style="border: none;" class="list-group-item d-flex justify-content-between">
                                    <a style="border: inset;" class="form-control" href="{{route('profil.main')}}">
                                        <img style="" src="{{asset('icon/people.svg')}}"> Informasi Akun
                                    </a>
                                </li>
                                <li style="border: none;" class="list-group-item d-flex justify-content-between">
                                    <a style="border: inset;" class="form-control" href="{{route('profil.reset')}}">
                                        <img style="" src="{{asset('icon/lock.svg')}}"> Ganti Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2"></div>
                    </div>            
				</div>
			</div>
		</section>
	</main>

    @include('shared.modal_auth')
    @include('shared.script')

</body>

</html>