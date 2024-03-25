@extends('admin.dashboard.index')

@section('title', 'Master Banner')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.galeri') }}" title="">Master Banner</a></li>
@endsection

@section('custom-css')
    
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
    Master Banner
    </div>
    <div class="col-4">
        <div class="input-group">
            <a href="{{ route('admin.add.galeri') }}" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add Banner</span>
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
                        <th>Image</th>
                        <th>Category</th>
                        <!-- <th>Caption</th> -->
                        <th>Activity Information</th>
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
                        <td>{{$berita->category}}</td>
                        <!-- <td>
                            {{$berita->caption}}
                        </td> -->
                        <td>
                            <ul>
                                <!-- <li>Created by : {{$berita->created_by}}</li> -->
                                <li>Created at : {{$berita->created_at}}</li>
                                <li>Edited at : {{$berita->updated_at}}</li>
                                <!-- <li>Publish at : {{$berita->approved_at}}</li> -->
                            </ul>
                        </td>
                        <td>
                            <div class="button soft-danger"><a href="{{ route('admin.delete.galeri', encrypt($berita->id)) }}" onclick="return confirm('Are you Sure delete this image?')"><i class="icofont-trash"></i></a></div>
                            <div class="button soft-primary"><a href="{{ route('admin.edit.galeri', encrypt($berita->id)) }}"><i class="icofont-pen-alt-1"></i></a></div>
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
                Access-Control-Allow-Origin: *
            }
        });
        $(this).on('change', 'input[name="status"]', function(e) {
            var id = $(this).attr('data-id');
            var dataStatus = '1';
            if($(this).prop("checked") == false){
                dataStatus = '0';
            }
            $.ajax({
                url: '{{ url("admin/status-galeri/")}}'+'/'+id,
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