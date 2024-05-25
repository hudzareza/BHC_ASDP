@extends('admin.dashboard.index')

@section('title', 'Add Language')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.lang') }}" title="">Language</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Language
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.lang') }}" class="button uk-button-default ml-auto px-3 py-2">
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
        <form id="formBerita" action="{{ route('admin.lang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Name <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput1" class="uk-input" type="text" placeholder="example: 'Bahasa Indonesia'" name="name">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText1">0</span>/50 characters
                        </div>
                    </fieldset>
                    <h4>Alias <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput2" class="uk-input" type="text" placeholder="example: 'indonesia'" name="alias">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText2">0</span>/50 characters
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
    <div class="col-lg-4 col-12">
        <div class="uk-card uk-card-default uk-width-1-2@m card">
            <div class="card-body">
                <div class="col-12 px-0 mb-3">
                    <h4>Kode Bahasa <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <select class="uk-select" id="status">
                                <option value="" selected>pilih</option>
                                <option value="sa">(sa) - arab saudi</option>
                                <option value="ar">(ar) - argentina</option>
                                <option value="at">(at) - austria</option>
                                <option value="nl">(nl) - belanda</option>
                                <option value="br">(br) - brazil</option>
                                <option value="en">(en) - inggris</option>
                                <option value="dk">(dk) - denmark</option>
                                <option value="ph">(ph) - filipina</option>
                                <option value="hk">(hk) - hongkong</option>
                                <option value="in">(in) - india</option>
                                <option value="id">(id) - indonesia</option>
                                <option value="it">(it) - italia</option>
                                <option value="jp">(jp) - jepang</option>
                                <option value="de">(de) - jerman</option>
                                <option value="kh">(kh) - kamboja</option>
                                <option value="kr">(kr) - korea selatan</option>
                                <option value="my">(my) - malaysia</option>
                                <option value="mx">(mx) - meksiko</option>
                                <option value="eg">(eg) - mesir</option>
                                <option value="mm">(mm) - myanmar</option>
                                <option value="ps">(ps) - palestina</option>
                                <option value="fr">(fr) - perancis</option>
                                <option value="pt">(pt) - portugal</option>
                                <option value="ru">(ru) - rusia</option>
                                <option value="es">(es) - spanyol</option>
                                <option value="tw">(tw) - taiwan</option>
                                <option value="th">(th) - thailand</option>
                                <option value="tr">(tr) - turki</option>
                                <option value="vn">(vn) - vietnam</option>
                                <option value="gr">(gr) - yunani</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div id="status-error" class="alert alert-danger d-none">
                    * Mohon pilih kode bahasa.
                </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        const titleInput = document.getElementById("textInput1");
        const charCount = document.getElementById("charCountText1");
        const textInput = document.getElementById("textInput2");
        const charCountText = document.getElementById("charCountText2");

        titleInput.addEventListener("input", function() {
            charCount.textContent = titleInput.value.length;
        });

        textInput.addEventListener("input", function() {
            charCountText.textContent = textInput.value.length;
        });
    });
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

            var isEmpty = false;
            var isEmptyDropdown = false;
            var selected = $('#status').val();

            // Check if dropdown month is empty
            if (selected === '') {
                $('#status-error').removeClass('d-none'); // Show the error message
                isEmptyDropdown = true; // Set isValid menjadi false jika dropdown month kosong
            } else {
                $('#status-error').addClass('d-none'); // Hide the error message
            }

            // Memeriksa setiap input dalam form
            var inputs = $('#formBerita input[type="text"]');

            inputs.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
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
            if (isEmpty || isEmptyDropdown) {
                return false;
            } else {
                // Jika semua input sudah diisi, kirim formulir
                submitForm();
            }
        });


    });

    async function addDataForm() {
        var valueStatus = $('#status').val();
        // var valueFront = $('#front').val();
        $('#formBerita').append('<input type="hidden" name="kode" value="' + valueStatus + '" /> ');
        // $('#formBerita').append('<input type="hidden" name="is_front" value="'+valueFront+'" /> ');
        return;
    }

    async function submitForm() {
        await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection