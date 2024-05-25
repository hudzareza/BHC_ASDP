@extends('admin.dashboard.index')

@section('title', 'Add Master Banner')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.galeri') }}" title="">Master Banner</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Master Banner
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.galeri') }}" class="button uk-button-default ml-auto px-3 py-2">
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
        <form id="formBerita" action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <!-- <input id="image" type="hidden" name="image"> -->
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <div class="s-desc">
                        <h4 class="sc-left">Image Thumbnail <span class="text-danger">(* harus diisi)</span></h4>
                        <small class="sc-right text-danger">(Ukuran fit banner 1450 x 620)</small>
                    </div>
                    <label for="img" class="input-preview">
                        <input id="img" class="image" type="file" accept="image/jpg, image/png, image/jpeg">
                        <!-- <input name="photo"  id="img" class="input-preview__src" type="file"> -->
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
                            <button type="button" style="margin-top: auto !important;" class="btn btn-primary" id="crop" data-dismiss="modal">Crop</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Category <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput1" class="uk-input" type="text" placeholder="" name="category">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText1">0</span>/50 characters
                        </div>
                    </fieldset>
                    <h4>Caption <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput2" class="uk-input" type="text" placeholder="" name="caption">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText2">0</span>/50 characters
                        </div>
                    </fieldset>
                </div>
            </div>
        </form>
    </div>
    <script>

    </script>
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
                aspectRatio: 1450 / 620,
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

        $(this).on('click', '#button-save', function(e) {
            e.preventDefault();

            // Memeriksa setiap input dalam form
            var inputs = $('#formBerita input[type="text"], input[name="photo"]');
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

    async function addDataForm() {
        var valueStatus = $('#status').val();
        // var valueFront = $('#front').val();
        $('#formBerita').append('<input type="hidden" name="status" value="' + valueStatus + '" /> ');
        // $('#formBerita').append('<input type="hidden" name="is_front" value="'+valueFront+'" /> ');
        return;
    }

    async function submitForm() {
        await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection