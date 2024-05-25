@extends('admin.dashboard.index')

@section('title', 'Event Language')

@section('page-breadcrumb')
<li><a href="#" title="">Event Language</a></li>
<li><a href="#" title="">Event Layout</a></li>
@endsection

@section('custom-css')
<link rel="stylesheet" href="{{ asset('frontend/css/dropzone.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/summernote.min.css') }}">
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Event Layout
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
                <img alt="posted-image" src="{{ asset('layout/event.png') }}">
                <img alt="posted-image" src="{{ asset('layout/event2.png') }}">
                <img alt="posted-image" src="{{ asset('layout/event3.png') }}">
            </div>
        </div>
        <form id="formBerita" action="{{ route('admin.upsert.event', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="uk-card uk-card-default uk-width-1-2@m card">
                <div class="card-body">
                    <h4>Div "Data tidak ditemukan" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$event->nodata ?? ''}}" type="text" placeholder="" name="nodata">
                        </div>
                    </fieldset>
                    <h4>Div "Header Tahun" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$event->tahun_header ?? ''}}" type="text" placeholder="" name="tahun_header">
                        </div>
                    </fieldset>
                    <h4>Div "Tombol Detail" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" value="{{$event->btn_detail ?? ''}}" type="text" placeholder="" name="btn_detail">
                        </div>
                    </fieldset>
                    <h4>Div "Januari" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->januari ?? ''}}" placeholder="" name="januari">
                        </div>
                    </fieldset>
                    <h4>Div "Februari" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->februari ?? ''}}" placeholder="" name="februari">
                        </div>
                    </fieldset>
                    <h4>Div "Maret" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->maret ?? ''}}" placeholder="" name="maret">
                        </div>
                    </fieldset>
                    <h4>Div "April" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->april ?? ''}}" placeholder="" name="april">
                        </div>
                    </fieldset>
                    <h4>Div "Mei" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->mei ?? ''}}" placeholder="" name="mei">
                        </div>
                    </fieldset>
                    <h4>Div "Juni" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->juni ?? ''}}" placeholder="" name="juni">
                        </div>
                    </fieldset>
                    <h4>Div "Juli" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->juli ?? ''}}" placeholder="" name="juli">
                        </div>
                    </fieldset>
                    <h4>Div "Agustus" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->agustus ?? ''}}" placeholder="" name="agustus">
                        </div>
                    </fieldset>
                    <h4>Div "September" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->september ?? ''}}" placeholder="" name="september">
                        </div>
                    </fieldset>
                    <h4>Div "Oktober" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->oktober ?? ''}}" placeholder="" name="oktober">
                        </div>
                    </fieldset>
                    <h4>Div "November" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->november ?? ''}}" placeholder="" name="november">
                        </div>
                    </fieldset>
                    <h4>Div "Desember" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->desember ?? ''}}" placeholder="" name="desember">
                        </div>
                    </fieldset>
                    <h4>Div "Acara Lainnya" <span class="text-danger">(* harus diisi)</span></h4>
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            <input class="uk-input" type="text" value="{{$event->lainnya ?? ''}}" placeholder="" name="lainnya">
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