@extends('admin.dashboard.index')

@section('title', 'Ticket')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.tiket') }}" title="">Ticket</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
        Ticket
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.add.artikel.tiket') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add Ticket</span>
            </a>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table id="myTableJelajah">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Activity Information</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                    <tr>
                        <td>{{++$loop->index}}</td>
                        <td>
                            <div class="activity-thumbnail">
                                <img alt="posted-image" src="{{ asset('images/article/'.$berita->photo) }}">
                            </div>
                        </td>
                        <td>
                            {{$berita->name}}
                        </td>
                        <td>
                            {{$berita->url}}
                        </td>
                        <td>
                            <ul>
                                <!-- <li>Created by : {{$berita->created_by}}</li> -->
                                <li>Created at : {{$berita->created_at}}</li>
                                <li>Edited at : {{$berita->updated_at}}</li>
                                <!-- <li>Publish at : {{$berita->approved_at}}</li> -->
                            </ul>
                        </td>
                        <td>
                            @if($berita->approved =='1')
                            <span class="badge bg-warning">Publish</span>
                            @else
                            <span class="badge bg-light">Draft</span>
                            @endif

                        </td>
                        <td>
                            @if($berita->approved =='1')
                            <div class="button soft-info">
                                <a href="{{ route('admin.change.artikel.tiket', encrypt($berita->id)).'/0' }}">
                                    <!-- <i class="icofont-pen-alt-1"></i> -->
                                    unpublish
                                </a>
                            </div>
                            @else
                            <div class="button soft-success">
                                <a href="{{ route('admin.change.artikel.tiket', encrypt($berita->id)).'/1' }}">
                                    <!-- <i class="icofont-pen-alt-1"></i> -->
                                    publish
                                </a>
                            </div>
                            <div class="button soft-danger"><a href="{{ route('admin.delete.artikel.tiket', encrypt($berita->id)) }}" onclick="return confirm('Are you Sure delete this article?')"><i class="icofont-trash"></i></a></div>
                            @endif
                            <div class="button soft-primary"><a href="{{ route('admin.edit.artikel.tiket', encrypt($berita->id)) }}"><i class="icofont-pen-alt-1"></i></a></div>
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
                url: '{{ url("admin/status-tiket/")}}' + '/' + id,
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