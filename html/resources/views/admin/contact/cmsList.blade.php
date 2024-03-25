@extends('admin.dashboard.index')

@section('title', 'Pesan')

@section('page-breadcrumb')
<li><a href="{{ route('admin.kontak.kami.main') }}" title="">Pesan (Kontak Kami)</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Pesan (Kontak Kami)
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>
                            {{substr(ucwords($berita->name),0,50)}}
                        </td>
                        <td>
                            {{substr(ucwords($berita->email),0,50)}}
                        </td>
                        <td>
                            {!! nl2br(e(substr(ucwords($berita->content),0,20))) !!}...
                            <!-- {{substr(ucwords($berita->content),0,20)}}... -->
                        </td>
                        <td>
                            <button class="button soft-primary" data-toggle="modal" data-target="#myModal{{($berita->id)}}">View</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{($berita->id)}}" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>Name : {{ucwords($berita->name)}}</b></p>
                                            <p><b>Email : {{ucwords($berita->email)}}</b></p>
                                            <p>{!! nl2br(e(ucwords($berita->content))) !!}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <button class="button soft-danger"><a href="{{ route('admin.delete.kontak.kami', encrypt($berita->id)) }}" onclick="return confirm('Are you Sure delete this article?')"><i class="icofont-trash"></i></a></button>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7">Empty</td>
                    </tr>
                    @endforelse

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
                url: '{{ url("admin/status-faq/")}}' + '/' + id,
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