@extends('admin.dashboard.index')

@section('title', 'Create Events')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.event') }}" title="">Events</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Create Events
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.artikel.event') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="fal fa-plus-circle"></i> <span class="d-none d-md-inline">To List Event</span>
            </a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-12">
        <style>
            img {
                display: block;
                max-width: 100%;
            }

            .preview {
                text-align: center;
                overflow: hidden;
                width: 160px;
                height: 160px;
                margin: 10px;
                border: 1px solid red;
            }

            .section {
                margin-top: 150px;
                background: #fff;
                padding: 50px 30px;
            }

            .modal-lg {
                max-width: 1000px !important;
            }

            .image {
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
        <form id="formBerita" action="{{ route('admin.event.store.main') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <!-- <input id="image" type="hidden" name="image"> -->
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <div class="s-desc">
                        <h4 class="sc-left">Image Thumbnail <span class="text-danger">(* harus diisi)</span></h4>
                        <small class="sc-right text-danger">(Maksimal Upload 20 Mb)</small>
                    </div>
                    <label for="img" class="input-preview">
                        <input id="img" class="image" type="file" accept="image/jpg, image/png, image/jpeg">
                    </label>
                    <input name="photo" type="hidden" id="hidden" />

                </div>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" style="margin-top: auto !important;" id="crop" data-dismiss="modal">Crop</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Title <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="75" id="titleInput" class="uk-input" type="text" placeholder="Ketikan Judul" name="title">
                        </div>
                        <div class="uk-margin">
                            <span id="charCount">0</span>/75 characters
                        </div>
                    </fieldset>
                    <div class="s-desc">
                        <h4 class="sc-left">Sub Title <span class="text-danger">(* harus diisi)</span> </h4>
                        <small class="sc-right text-danger">(Maksimal 150 Karakter)</small>
                    </div>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <textarea maxlength="150" id="textInput" class="uk-textarea" rows="5" placeholder="Sub Judul" name="description"></textarea>
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText">0</span>/150 characters
                        </div>
                    </fieldset>
                    <h4>Content <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <textarea id="myTextarea" name="content"></textarea>
                            <!-- <textarea id="description" class="uk-textarea" rows="20" placeholder="" name="content"></textarea> -->
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
                    <h4>Status Publish</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <select class="uk-select" id="status">
                                <option value="1">Publish</option>
                                <option value="0" selected>Draft</option>
                            </select>
                        </div>
                    </fieldset>
                    <h4>Event Month <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <select class="uk-select" id="month">
                                <option value="">Choose month</option>

                                @foreach($month as $bulan)
                                <option value="{{$bulan['id']}}">{{$bulan['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <div id="month-error" class="alert alert-danger d-none">
                        * Mohon pilih Bulan.
                    </div>
                    <h4>Event Year <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <select class="uk-select" id="year">
                                <option value="">Choose year</option>

                                @foreach($year as $tahun)
                                <option value="{{$tahun['id']}}">{{$tahun['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>
                    <div id="year-error" class="alert alert-danger d-none">
                        * Mohon pilih Tahun.
                    </div>
                    <h4>Select Languange <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        @foreach(App\Models\Language::all()->sortByDesc('id') as $lang)
                        <div class="uk-margin">
                            <label>
                                <input type="radio" id="front" value="{{$lang->kode}}" name="kode"> {{$lang->alias}}
                            </label>
                        </div>
                        @endforeach
                        <!-- <div class="uk-margin">
                            <label>
                                <input type="radio" id="front" value="en" name="kode"> English
                            </label>
                        </div> -->
                    </fieldset>
                </div>
                <div id="language-error" class="alert alert-danger d-none">
                    * Mohon pilih bahasa.
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
<script src="{{ asset('backend/js/tinymce.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const titleInput = document.getElementById("titleInput");
        const charCount = document.getElementById("charCount");
        const textInput = document.getElementById("textInput");
        const charCountText = document.getElementById("charCountText");

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

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };

            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
                file = files[0];

                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1920 / 1200,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {

            // var originalWidth = cropper.getImageData().naturalWidth;
            // var originalHeight = cropper.getImageData().naturalHeight;

            var originalWidth = 2900;
            var originalHeight = 2300;

            var aspect_ratio = originalWidth / originalHeight;

            canvas = cropper.getCroppedCanvas({
                width: originalWidth,
                height: originalHeight / aspect_ratio,
                // minWidth: originalWidth,
                // minHeight: originalHeight / aspect_ratio,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });
            // console.log(canvas);
            const filePreview = document.querySelector('.input-preview');
            var fileImage = document.querySelector('.image').files[0];
            var hidden = document.getElementById('hidden');

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                //  console.log(url);

                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    // console.log(base64data);
                    filePreview.style.backgroundImage = "url(" + base64data + ")";
                    filePreview.classList.add("has-image");
                    hidden.value = base64data;
                }
            });

        });


        // const fileImage = document.querySelector('.input-preview__src');
        // const filePreview = document.querySelector('.input-preview');

        // fileImage.onchange = function () {
        //     const reader = new FileReader();

        //     reader.onload = function (e) {
        //         // get loaded data and render thumbnail.
        //         filePreview.style.backgroundImage  = "url("+e.target.result+")";
        //         filePreview.classList.add("has-image");
        //     };

        //     // read the image file as a data URL.
        //     reader.readAsDataURL(this.files[0]);
        // };

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

        tinymce.init({
            selector: '#myTextarea',
            // width: 600,
            // height: 300,
            plugins: [
                'advlist autolink link image lists charmap preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table template paste'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link | preview fullscreen | ' +
                'forecolor backcolor',

            menubar: false
        });


        // Function to validate checkbox and show/hide language error message
        // function validateCheckbox() {

        // }

        // function validateDropdowns() {


        //     return isValid; // Kembalikan nilai isValid setelah semua validasi selesai

        // }


        $(this).on('click', '#button-save', function(e) {
            e.preventDefault();
            var kontenHTML = tinymce.get('myTextarea').getContent();
            // alert(kontenHTML);
            // Setel nilai input dengan konten HTML
            $("#myTextarea").val(kontenHTML);

            // Memeriksa setiap input dalam form
            var isEmptyInput1 = false;
            var isEmptyInput2 = false;
            var isEmptyInput3 = false;
            var isEmptyDropdown = false;
            var isEmptyRadiobutton = false;

            var inputs1 = $('#formBerita input[type="text"]');

            inputs1.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmptyInput1 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

            var inputs2 = $('#formBerita input[name="photo"]');

            inputs2.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmptyInput2 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

            var inputs3 = $('#formBerita textarea');

            inputs3.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmptyInput3 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

            var selectedMonth = $('#month').val();
            var selectedYear = $('#year').val();

            // Check if dropdown month is empty
            if (selectedMonth === '') {
                $('#month-error').removeClass('d-none'); // Show the error message
                isEmptyDropdown = true; // Set isValid menjadi false jika dropdown month kosong
            } else {
                $('#month-error').addClass('d-none'); // Hide the error message
            }

            // Check if dropdown year is empty
            if (selectedYear === '') {
                $('#year-error').removeClass('d-none'); // Show the error message
                isEmptyDropdown = true; // Set isValid menjadi false jika dropdown year kosong
            } else {
                $('#year-error').addClass('d-none'); // Hide the error message
            }

            // Mendapatkan nilai radio button yang dipilih
            var selectedOption = $('#formBerita input[name="kode"]:checked').val();

            // Memeriksa apakah radio button telah dipilih
            if (!$('input[name="kode"]').is(':checked')) {
                $('#language-error').removeClass('d-none'); // Show the error message
                isEmptyRadiobutton = true;
            } else {
                $('#language-error').addClass('d-none'); // Hide the error message
                isEmptyRadiobutton = false;
            }
            // console.log(isEmptyInput, isEmptyDropdown, isEmptyRadiobutton);
            // Jika ada input yang kosong atau salah satu validasi tidak lolos
            if (isEmptyInput1 === true || isEmptyInput2 === true || isEmptyInput3 === true || isEmptyDropdown === true || isEmptyRadiobutton === true) {
                return false; // Hentikan proses pengiriman formulir
            } else {
                // Jika semua input sudah diisi dan validasi lolos, kirim formulir
                submitForm();
            }
        });

    });

    async function addDataForm() {
        var valueStatus = $('#status').val();
        var valueMonth = $('#month').val();
        var valueYear = $('#year').val();
        var valueKode = $('input[name="kode"]:checked').val();
        $('#formBerita').append('<input type="hidden" name="status" value="' + valueStatus + '" /> ');
        $('#formBerita').append('<input type="hidden" name="month" value="' + valueMonth + '" /> ');
        $('#formBerita').append('<input type="hidden" name="year" value="' + valueYear + '" /> ');
        $('#formBerita').append('<input type="hidden" name="kode" value="' + valueKode + '" /> ');
        return;
    }

    async function submitForm() {
        await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection