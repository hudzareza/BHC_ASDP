@extends('admin.dashboard.index')

@section('title', 'Layout')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.lang') }}" title="">Layout</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Layout
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
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table class="table table-default all-events table-striped table-responsive-lg">

                <tbody>
                    <tr>
                        <td>
                            Navbar
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.navbar', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Footer
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.footer', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Login
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.login', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Beranda
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.home', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Kalender Acara
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.event', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Jelajah BHC
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.jelajah', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Info BHC
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.info', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Tiket
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.ticket', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Promo
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.promo', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Kontak
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.contact', $id) }}">Add</a></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Halaman Profile
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.add.profile', $id) }}">Add</a></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                Access - Control - Allow - Origin: *
            }
        });
        $(this).on('change', 'input[name="status"]', function(e) {
            var id = $(this).attr('data-id');
            var dataStatus = '1';
            if ($(this).prop("checked") == false) {
                dataStatus = '0';
            }
            $.ajax({
                url: '{{ url("admin/status-info/")}}' + '/' + id,
                type: 'POST',
                data: {
                    status: dataStatus
                },
                success: function(resp) {
                    alert(resp.data);
                }
            });
        });

    });
</script>
@endsection