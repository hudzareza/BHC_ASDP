@extends('admin.dashboard.index')

@section('title', 'Edit Ticket')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.tiket') }}" title="">Ticket</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Ticket
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.artikel.tiket') }}" class="button uk-button-default ml-auto px-3 py-2">
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
        <form id="formBerita" action="{{ route('admin.update.artikel.tiket', encrypt($berita->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <!-- <input id="image" type="hidden" name="image"> -->
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <div class="s-desc">
                        <h4 class="sc-left">Logo Thumbnail</h4>
                        <small class="sc-right text-danger">(Maksimal Upload 20 Mb)</small>
                    </div>
                    <label for="img" class="input-preview">
                        <input id="img" class="image" type="file" accept="image/jpg, image/png, image/jpeg">
                    </label>
                    <input name="exist" value="{{$berita->photo}}" type="hidden" />

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
                    <h4>Name</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput1" class="uk-input" value="{{$berita->name}}" type="text" placeholder="Ketikan nama tiket" name="name">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText1">0</span>/50 characters
                        </div>
                    </fieldset>
                    <h4>URL</h4>
                    <fieldset class="uk-fieldset">
                        <small class="sc-right text-danger">(Contoh : www.website.com | www.website.id | website.com | website.id)</small>
                        <div class="uk-margin">
                            <input maxlength="50" id="textInput2" class="uk-input" value="{{$berita->url}}" type="text" placeholder="Ketikan URL" name="url">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText2">0</span>/50 characters
                        </div>
                    </fieldset>
                    <!-- <input type="hidden" name="id" value="{{$berita->id}}"> -->
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

                                {{$stat = ''}}
                                @if($berita->approved == '0')
                                {{$stat = 'Draft'}}
                                <option value="{{$berita->approved}}" selected>{{$stat}}</option>
                                <option value="1">Publish</option>
                                @elseif($berita->approved == '1')
                                {{$stat = 'Publish'}}
                                <option value="{{$berita->approved}}" selected>{{$stat}}</option>
                                <option value="0">Draft</option>
                                @endif

                            </select>
                        </div>
                    </fieldset>
                    <!-- <h4>Halaman Depan</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <select class="uk-select" id="front">
                                <option value="ya">Ya</option>
                                <option value="tidak" selected>Tidak</option>
                            </select>
                        </div>
                    </fieldset> -->
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

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        const filePreview = document.querySelector('.input-preview');

        filePreview.style.backgroundImage = "url({{ asset('images/article/'.$berita->photo) }})";

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
                aspectRatio: 60 / 60,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 60,
                height: 60,
                // minWidth: 60,
                // minHeight: 60,
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

        // filePreview.style.backgroundImage  = "url({{ asset('images/article/'.$berita->photo) }})";

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

            submitForm();
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