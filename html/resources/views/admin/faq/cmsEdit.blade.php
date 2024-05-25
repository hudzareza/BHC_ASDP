@extends('admin.dashboard.index')

@section('title', 'Edit FAQ')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.faq') }}" title="">FAQ</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
<script src="{{ asset('backend/js/tinymce.min.js') }}"></script>

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        FAQ
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.artikel.faq') }}" class="button uk-button-default ml-auto px-3 py-2">
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
        <form id="formBerita" action="{{ route('admin.update.artikel.faq', encrypt($berita->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Question</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input maxlength="75" id="textInput1" class="uk-input" value="{{$berita->question}}" type="text" placeholder="" name="question">
                        </div>
                        <div class="uk-margin">
                            <span id="charCountText1">0</span>/75 characters
                        </div>
                    </fieldset>
                    <h4>Answer</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <textarea id="myTextarea" name="answer">{{$berita->answer}}</textarea>
                            <!-- <textarea id="description" class="uk-textarea" rows="20" placeholder="" name="content">{{$berita->content}}</textarea> -->
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
                    <h4>Select Languange</h4>
                    <fieldset class="uk-fieldset">
                        @foreach(App\Models\Language::all()->sortByDesc('id') as $lang)
                        <div class="uk-margin">
                            <label>
                                <input type="radio" id="front" value="{{$lang->kode}}" name="kode" <?php if ($berita->kode == $lang->kode) echo 'checked'; ?>> {{$lang->alias}}
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

        titleInput.addEventListener("input", function() {
            charCount.textContent = titleInput.value.length;
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

        tinymce.init({
            selector: '#myTextarea',
            forced_root_block: false,
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
            submitForm();
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