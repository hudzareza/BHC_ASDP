<!doctype html>
<html lang="en" style="font-size: 16px;">

@include('shared.header')

<body>

    @include('shared.navbar')

    <main style="background-color: #F8F9FC;">

        <section class="k_e_1">
            <div class="main-banner" style="background: url('{{asset('assets/images/banner/bhc_51.png')}}')">
                <div class="dark-transparent"></div>
                <div class="inner_k_e_1">
                    <p class="title">{{ __('profile.header') }}</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumbs">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{ __('navbar.beranda') }}</a></li>
                            <li class="breadcrumb-item"><img src="{{asset('assets/images/arrow-right.png')}}"></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('profil.main')}}">{{ __('profile.header') }}</a></li>
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
                            <form action="{{route('profil.info.store')}}" method="POST">
                                @csrf
                                <ul class="list-group">
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <p class="desc-kontak" style="text-align:left !important;"><b>{{ __('profile.informasi') }}</b></p>
                                    </li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>{{ __('profile.nama') }}</label>
                                            <input value="{{ Auth::user()->name }}" type="text" class="form-control" aria-label="First name" name="name">
                                        </div>
                                    </li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>{{ __('profile.telepon') }}</label>
                                            <input value="{{ Auth::user()->phone_number }}" type="text" class="form-control" aria-label="Last name" name="phone_number">
                                        </div>
                                    </li>
                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <label>{{ __('login.email') }}</label>
                                            <input value="{{ Auth::user()->email }}" type="text" class="form-control" aria-label="Last name" name="email">
                                        </div>
                                    </li>
                                    <input value="{{ encrypt(Auth::user()->id) }}" type="hidden" class="form-control" aria-label="Last name" name="id">

                                    <li style="border: none;" class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4"><button style="float: right;" type="submit" class="btn-green">{{ __('profile.btn') }}</button></div>
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
                                        <img style="" src="icon/people.svg"> {{ __('profile.informasi_akun') }}
                                    </a>
                                </li>
                                <li style="border: none;" class="list-group-item d-flex justify-content-between">
                                    <a style="border: inset;" class="form-control" href="{{route('profil.reset')}}">
                                        <img style="" src="icon/lock.svg"> {{ __('profile.ganti_password') }}
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