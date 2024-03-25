@extends('admin.dashboard.index')

@section('title', 'Event Month')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.event.bulanan') }}" title="">Event Month</a></li>
@endsection

@section('custom-css')
    
@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-4 d-flex align-items-center">
    Event Month
    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <div class="col-md-12">
                <div class="row pencariansearch">
                    <div class="col-md-3">
                    
                        <div class="form-group">
                        <small>note : sortir event berdasarkan tahun</small>
                            <select onchange="year()" id="year" class="form-control select2bs4" style="width: 100%;">    
                                <option value="">Pilih Tahun</option>
                                @foreach($yearlist as $year)
                                <option value="{{$year->name}}">{{$year->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function() {
                $('#year').on('change', function() {
                    // alert(  );
                    $('.tahun').val(); 
                });
            });
            </script>
            <table class="table table-default all-events table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($monthlist as $month)
                    <tr>
                        <td>{{$month->id}}</td>
                        <td>
                            {{$month->name}}
                        </td>
                        <td><p class="tahun"></p></td>
                        
                        <td>
                            @if($month->approved =='0')
                                
                                <div class="button soft-primary"><a href=""><i class="icofont-pen-alt-1"></i></a></div>
           
                            @else
                    
                                       
                            @endif
                            
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
                url: '{{ url("admin/status-event/")}}'+'/'+id,
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
