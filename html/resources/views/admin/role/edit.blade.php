@extends('admin.dashboard.index')

@section('title', 'Add Role')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.role') }}" title="">Role</a></li>
<li><a href="#" title="">Create</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
    Role
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.list.role') }}" class="button uk-button-default ml-auto px-3 py-2">
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
        <form id="formBerita" action="{{ route('admin.update.role', encrypt($berita->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Name</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input value="{{$berita->name}}" class="uk-input" type="text" placeholder="Nama" name="name">
                        </div>
                    </fieldset>
                    <h4>Desc</h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input value="{{$berita->desc}}" class="uk-input" type="text" placeholder="Deskripsi" name="desc">
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

            submitForm();
        });

        
    });

    async function addDataForm() {
        var valueStatus = $('#status').val();
        // var valueFront = $('#front').val();
        $('#formBerita').append('<input type="hidden" name="role" value="'+valueStatus+'" /> ');
        // $('#formBerita').append('<input type="hidden" name="is_front" value="'+valueFront+'" /> ');
        return;
    }

    async function submitForm() {
        await addDataForm();

        $('#formBerita').submit();
    }
</script>
@endsection