@extends('admin.dashboard.index')

@section('title', 'Language')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.lang') }}" title="">Language</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Language
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.add.lang') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add Language</span>
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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Alias</th>
                        <th>Kode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beritas as $berita)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>
                            {{strip_tags($berita->name)}}
                        </td>
                        <td>
                            {{strip_tags($berita->alias)}}
                        </td>
                        <td>
                            {{strip_tags($berita->kode)}}
                        </td>
                        <td>
                            <div class="button soft-primary"><a href="{{ route('admin.edit.lang', encrypt($berita->id)) }}">Edit</a></div>
                            <div class="button soft-success"><a href="{{ route('admin.layout.lang', encrypt($berita->id)) }}">Add Layout</a></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="7"></td>
                    </tr>
                    @endforeach
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
        // $(this).on('change', 'input[name="front"]', function(e) {
        //     var id = $(this).attr('data-id');
        //     var dataFront = 'ya';
        //     if($(this).prop("checked") == false){
        //         dataFront = 'tidak';
        //     }
        //     $.ajax({
        //         url: '/admin/berita-inovasi/changeFront/'+id,
        //         type: 'POST',
        //         data: {
        //             status: dataFront
        //         },
        //         success: function(resp) {
        //             alert(resp.data);
        //         }
        //     });
        // });
    });
</script>
@endsection