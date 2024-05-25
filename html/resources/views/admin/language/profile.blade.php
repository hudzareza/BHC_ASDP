@extends('admin.dashboard.index')

@section('title', 'Profile Language')

@section('page-breadcrumb')
<li><a href="#" title="">Profile Language</a></li>
<li><a href="#" title="">Profile Layout</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Profile Layout
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.layout.lang', $id) }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="fal fa-plus-circle"></i> <span class="d-none d-md-inline">Back</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-12">
        <style>
            .input-preview__src {
                display: none;
            }

            .input-preview {
                border: dashed black 0.175em;
                border-radius: 0.5em;
                /* width: 90vw; */
                height: 200px;
                display: flex;
                justify-content: center;
                align-items: center;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                position: relative;
                transition: ease-in-out 750ms;
            }

            .input-preview::after {
                position: absolute;
                top: 50%;
                left: 0;
                width: 100%;
                text-align: center;
                transform: translateY(50%);
                content: "Pilih File...";
                font-style: italic;
                font-size: 1em;
            }

            .has-image::before {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(50, 50, 50, 0.5);
                content: " ";
                transition: ease-in-out 750ms;
            }

            .has-image::after {
                content: "Pilih File Lain...";
                color: white;
            }
        </style>
        <div class="uk-card uk-card-default uk-width-1-2@m card">
            <div class="card-body">
                <h4><b>Example Image</b></h4>
                <div class="uk-margin" style="color:crimson;"></div>
                <img alt="posted-image" src="{{ asset('layout/Profile.png') }}">
                <img alt="posted-image" src="{{ asset('layout/Profile2.png') }}">
                <img alt="posted-image" src="{{ asset('layout/Profile3.png') }}">
            </div>
        </div>
        <form id="formBerita" action="{{ route('admin.upsert.profile', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Div "Header Profile" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->header ?? ''}}" type="text" placeholder="" name="header">
                        </div>
                    </fieldset>
                    <h4>Div "Header Informasi" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->informasi ?? ''}}" type="text" placeholder="" name="informasi">
                        </div>
                    </fieldset>
                    <h4>Div "Nama Label" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->nama ?? ''}}" type="text" placeholder="" name="nama">
                        </div>
                    </fieldset>
                    <h4>Div "Telepon Label" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->telepon ?? ''}}" type="text" placeholder="" name="telepon">
                        </div>
                    </fieldset>
                    <h4>Div "Tombol Informasi Akun" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->informasi_akun ?? ''}}" type="text" placeholder="" name="informasi_akun">
                        </div>
                    </fieldset>
                    <h4>Div "Tombol Ganti Password" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->ganti_password ?? ''}}" type="text" placeholder="" name="ganti_password">
                        </div>
                    </fieldset>
                    <h4>Div "Password Lama Label" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->password_lama ?? ''}}" type="text" placeholder="" name="password_lama">
                        </div>
                    </fieldset>
                    <h4>Div "Password Baru Label" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->password_baru ?? ''}}" type="text" placeholder="" name="password_baru">
                        </div>
                    </fieldset>
                    <h4>Div "Konfirmasi" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->konfirmasi ?? ''}}" type="text" placeholder="" name="konfirmasi">
                        </div>
                    </fieldset>
                    <h4>Div "Tombol Simpan" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$profile->btn ?? ''}}" type="text" placeholder="" name="btn">
                        </div>
                    </fieldset>
                    <input type="hidden" value="{{$code}}" name="kode">
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-12">
        <div class="uk-card uk-card-default uk-width-1-2@m card">
            <div class="card-body">
                <div class="col-12 px-0">
                    <button id="button-save" type="button" class="col-12 button primary icon-label">
                        <span class="inner-icon"><i class="icofont-save"></i></span>
                        <span class="inner-text">Save</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script src="{{ asset('frontend/js/dropzone.min.js') }}"></script>
<script src="{{ asset('backend/js/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                // Access-Control-Allow-Origin: *

            }
        });



        $('#description').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['view', ['fullscreen']]
            ],
        });

        $(this).on('click', '#button-save', function(e) {
            e.preventDefault();

            // Memeriksa setiap input dalam form
            var inputs = $('#formBerita input[type="text"]');
            var isEmpty = false;

            inputs.each(function() {
                if ($(this).val() === '') {
                    isEmpty = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }
            });

            // Jika ada input yang kosong, hentikan proses pengiriman formulir
            if (isEmpty) {
                return false;
            } else {
                // Jika semua input sudah diisi, kirim formulir
                submitForm();
            }
        });


    });

    async function submitForm() {
        // await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection