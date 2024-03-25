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
                                    <!-- <h1 class="modal-title fs-5 mb-3 text-center" id="staticBackdropLabel">Daftar </h1> -->

                                    <form action="{{ route('store.admin') }}" method="post">
                                        @csrf
                                        <div class="mb-4">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror notranslate" id="name" name="name" value="{{ old('name') }}" placeholder="Username">
                                            @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror notranslate" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                                            @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <button class="btn btn-success w-100" type="submit">Daftar</button>
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