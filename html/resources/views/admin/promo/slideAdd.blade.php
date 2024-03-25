@extends('admin.dashboard.quick')

@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="col-md-8">
        <form role="search" id="searchform" action="{{ route('admin.promo.slide.add') }}" method="POST">
            @csrf
            @method("GET")
            <div class="row pencariansearch">
            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" name="src" placeholder="pencarian berdasarkan nama tiket" class="form-control select2bs4" style="width: 100%;">
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
                        <th>Photo</th>
                        <th>Title</th>
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
                            {{$berita->title}}
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
                                url: "{{ route('admin.banner.slidepromo') }}",
                                success: function(response, status){
                                    if (status == 'success') {
                                    console.log(response);
                                    window.parent.location.href = "{{ route('admin.promo.slide.list') }}";
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