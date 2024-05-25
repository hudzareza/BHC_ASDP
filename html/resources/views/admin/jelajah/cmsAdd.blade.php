@extends('admin.dashboard.index')

@section('title', 'Add Article Jelajah')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.jelajah') }}" title="">Jelajah Article</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Jelajah Article
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.artikel.jelajah') }}" class="button uk-button-default ml-auto px-3 py-2">
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

            body {
                background-color: #f5f5f5;
            }

            .imagePreview {
                width: 100%;
                height: 180px;
                background-position: center center;
                background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
                background-color: #fff;
                background-size: cover;
                background-repeat: no-repeat;
                display: inline-block;
                box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
            }

            .btn-primary {
                display: block;
                border-radius: 0px;
                box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
                margin-top: -5px;
            }

            .imgUp {
                margin-bottom: 15px;
            }

            .del {
                position: absolute;
                top: 0px;
                right: 15px;
                width: 30px;
                height: 30px;
                text-align: center;
                line-height: 30px;
                background-color: rgba(255, 255, 255, 0.6);
                cursor: pointer;
            }

            .imgAdd {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #4bd7ef;
                color: #fff;
                box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
                text-align: center;
                line-height: 30px;
                margin-top: 0px;
                cursor: pointer;
                font-size: 15px;
            }

            #language-error {
                margin-bottom: 15px;
            }
        </style>
        <form id="formBerita" action="{{ route('admin.jelajah.store') }}" method="POST" enctype="multipart/form-data">
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
                            <input class="uk-input" type="text" placeholder="Ketikan Judul" name="title" maxlength="75" id="titleInput">
                        </div>
                        <div class="uk-margin">
                            <span id="charCount">0</span>/75 characters
                        </div>
                    </fieldset>
                    <div class="s-desc">
                        <h4 class="sc-left">Sub Title <span class="text-danger">(* harus diisi)</span></h4>
                        <small class="sc-right text-danger">(Maksimal 150 Karakter)</small>
                    </div>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <textarea class="uk-textarea" rows="5" placeholder="Sub Judul" name="description" maxlength="150" id="textInput"></textarea>
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
                    <br>
                    <div class="container">
                        <h4>Gallery Jelajah</h4>
                        <br>
                        <div class="row">
                            <div class="col-sm-4 imgUp">
                                <div class="imagePreview"></div>
                                <label class="btn btn-primary">
                                    Upload<input id="multigaleri" type="file" class="uploadFile img" value="Upload Photo" name="gallery[]" style="width: 0px;height: 0px;overflow: hidden;" accept="image/jpg, image/png, image/jpeg">
                                </label>
                                <i class="icofont-close del"></i>
                            </div><!-- col-2 -->
                            <i class="icofont-plus imgAdd"></i>
                        </div><!-- row -->
                    </div><!-- container -->
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
                    <!-- Checkbox for Halaman Depan -->
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


    $(".imgAdd").click(function() {
        var imgNum = $('.imgUp').length; // Get the current number of uploaded images
        if (imgNum < 6) { // Check if the number of uploaded images is less than 6
            $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-4 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" accept="image/jpg, image/png, image/jpeg" class="uploadFile img" value="Upload Photo" name="gallery[]" style="width:0px;height:0px;overflow:hidden;"></label><i class="icofont-close del"></i></div>');
        } else {
            alert("Maksimal 6 foto."); // Display an alert if the maximum limit is reached
        }
    });
    $(document).on("click", "i.del", function() {
        // 	to remove card
        $(this).parent().remove();
        // to clear image
        // $(this).parent().find('.imagePreview').css("background-image","url('')");
    });
    $(function() {
        $(document).on("change", ".uploadFile", function() {
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test(files[0].type)) { // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function() { // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                }
            }

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



        $(this).on('click', '#button-save', function(e) {
            e.preventDefault();
            var kontenHTML = tinymce.get('myTextarea').getContent();
            // alert(kontenHTML);
            // Setel nilai input dengan konten HTML
            $("#myTextarea").val(kontenHTML);
            // document.getElementById('myTextarea').value = kontenHTML;



            // Memeriksa setiap input dalam form
            var isEmpty1 = false;
            var isEmpty2 = false;
            var isEmpty3 = false;
            var isEmptyRadiobutton = false;

            var inputs = $('#formBerita input[type="text"]');

            inputs.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmpty1 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

            var inputsArea = $('#formBerita textarea');

            inputsArea.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmpty2 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

            var inputsFile = $('#formBerita input[name="photo"]');

            inputsFile.each(function() {
                // Memeriksa apakah input teks, nomor, atau email kosong
                if ($(this).val() === '') {
                    isEmpty3 = true;
                    // Menampilkan pesan error di samping input yang kosong
                    $(this).addClass('is-invalid');
                    $(this).parent().append('<div style="font-size:17px;" class="invalid-feedback">* tidak boleh kosong.</div>');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).parent().find('.invalid-feedback').remove();
                }

            });

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
            // console.log(isEmpty1, isEmpty2, isEmpty3, isEmptyRadiobutton);

            // Jika ada input yang kosong, hentikan proses pengiriman formulir
            if (isEmpty1 === true || isEmpty2 === true || isEmpty3 === true || isEmptyRadiobutton === true) {
                return false;
            } else {
                // Jika semua input sudah diisi, kirim formulir
                submitForm();
            }

        });
    });

    async function addDataForm() {
        var valueStatus = $('input[name="kode"]:checked').val();
        var valueFront = $('#status').val();
        $('#formBerita').append('<input type="hidden" name="kode" value="' + valueStatus + '" /> ');
        $('#formBerita').append('<input type="hidden" name="status" value="' + valueFront + '" /> ');
        return;
    }

    async function submitForm() {
        await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection