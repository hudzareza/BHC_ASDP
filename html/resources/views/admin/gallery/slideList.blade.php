@extends('admin.dashboard.index')

@section('title', 'Slide Banner')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.banner') }}" title="">Slide Banner</a></li>
@endsection

@section('custom-css')
    
@endsection

@section('content-title')
<style>
.container {
  position: relative;
  width: 100%;
  overflow: hidden;
  padding-top: 56.25%; /* 16:9 Aspect Ratio */
  background-color: burlywood;
}

.responsive-iframe {
  position: absolute;
  top: 18px;
  left: 35px;
  bottom: 0;
  right: 0;
  width: 90%;
  height: 90%;
  border: none;
}
</style>
<div class="row mb-2">
    <div class="col-8 d-flex align-items-center">
    Slide Banner
    </div>
    <div class="col-4">
        <div class="input-group">
            <button id="iframe-pick" onclick="openIframe()" type="button" class="button uk-button-default ml-auto px-3 py-2">
                <i class="icofont-plus"></i> <span class="d-none d-md-inline">Add Banner</span>
            </button>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
    <div id="iframe" style="display:none;"></div>
        <div class="d-widget">
            <table id="lists" class="table table-default all-events table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category</th>
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
                        <td>
                            <div class="button soft-danger"><a href="{{ route('admin.delete.banner', encrypt($berita->id)) }}" onclick="return confirm('Are you Sure delete this image?')"><i class="icofont-trash"></i></a></div>
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
    function openIframe(){
    var iframe = '<div class="container" id="con"><iframe class="responsive-iframe" id="iframeFoto" src="{{ route("admin.add.banner") }}" allowfullscreen></iframe></div>';
        $("#iframe").html(iframe);
        $("#iframe").show(500);
        $('#iframe-pick').hide();
        $('#lists').hide();
    }
    function closeIframeArtikel(){
        $("#iframe").hide(500);
        $('#iframe-pick').show();
        $('#lists').show(200);
    }
    
</script>
@endsection