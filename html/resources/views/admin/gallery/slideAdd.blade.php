@extends('admin.dashboard.quick')

@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="col-md-8">
        <form role="search" id="searchform" action="{{ route('admin.add.banner') }}" method="POST">
            @csrf
            @method("GET")
            <div class="row pencariansearch">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="src" placeholder="pencarian berdasarkan category" class="form-control select2bs4" style="width: 100%;">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark w-100 ln12">Cari</button>
            </div>
            </div>
        </form>
        </div>
        
        <div style="float:right;" class="wrapper">
            <a href="#" class="btn btn-danger btn-block btn-sm" id="closepost" onclick="buttonClosed()">X</a>
        </div>
        
        <div class="d-widget">
        
            <table class="table table-default all-events table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th></th>
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
                            
                        </td>
                        <td>
                            <button id="myBtn" class="btn btn-success" onclick="data('{{$berita->id}}')"><i class="icofont-plus">Pilih</i></button>
                        <script>
                            function buttonClosed(){
                                parent.closeIframeArtikel();
                            }
                            function data(id) {
                                $.ajax({
                                method: "POST",
                                data: {
                                    id : id,
                                    _token: '{{csrf_token()}}'
                                },
                                url: "{{ route('admin.banner.store') }}",
                                success: function(response, status){
                                    if (status == 'success') {
                                    // console.log(response);
                                    window.parent.location.href = "{{ route('admin.list.banner') }}";
                                    }
                                }
                                });
                            }
                        </script>
                        </td>
                    </tr>
                    @empty
                    <script>
                        function buttonClosed(){
                                parent.closeIframeArtikel();
                            }
                    </script>
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

@endsection