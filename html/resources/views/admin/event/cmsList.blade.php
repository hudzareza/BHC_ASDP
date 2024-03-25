@extends('admin.dashboard.index')

@section('title', 'Event List')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.event') }}" title="">Event List</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')
<div class="row mb-2">
    <div class="col-4 d-flex align-items-center">
        Event List
    </div>
    <div class="col-4">

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
                            <small>Note : Pilih berdasarkan tahun</small>
                            <select onchange="year()" id="year" class="form-control select2bs4" style="width: 100%;">
                                <option value="">Pilih Tahun</option>
                                @foreach($yearlist as $year)
                                <option value="{{$year->id}}">{{$year->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="month" class="form-group" style="visibility:hidden;">
                            <small>Note : Pilih berdasarkan bulan</small>
                            <select id="monthsel" class="form-control select2bs4" style="width: 100%;">
                                <option value="">Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <h4><b>
                                @if(!isset($_GET['month']))
                                List Terbaru
                                @else
                                @if($_GET['month'] == 1)Januari
                                @elseif($_GET['month'] == 2)Februari
                                @elseif($_GET['month'] == 3)Maret
                                @elseif($_GET['month'] == 4)April
                                @elseif($_GET['month'] == 5)Mei
                                @elseif($_GET['month'] == 6)Juni
                                @elseif($_GET['month'] == 7)Juli
                                @elseif($_GET['month'] == 8)Agustus
                                @elseif($_GET['month'] == 9)September
                                @elseif($_GET['month'] == 10)Oktober
                                @elseif($_GET['month'] == 11)November
                                @elseif($_GET['month'] == 12)Desember
                                @endif
                                @endif
                                @if(!isset($_GET['year']))

                                @else
                                @if($_GET['year'] == 1)2020
                                @elseif($_GET['year'] == 2)2021
                                @elseif($_GET['year'] == 3)2022
                                @elseif($_GET['year'] == 4)2023
                                @elseif($_GET['year'] == 5)2024
                                @elseif($_GET['year'] == 6)2025
                                @elseif($_GET['year'] == 7)2026
                                @elseif($_GET['year'] == 8)2027
                                @elseif($_GET['year'] == 9)2028
                                @elseif($_GET['year'] == 10)2029
                                @elseif($_GET['year'] == 11)2030
                                @elseif($_GET['year'] == 12)2031
                                @elseif($_GET['year'] == 13)2032
                                @elseif($_GET['year'] == 14)2033
                                @elseif($_GET['year'] == 15)2034
                                @elseif($_GET['year'] == 16)2035
                                @endif
                                @endif
                            </b>
                        </h4>
                    </div>
                    @if(@$_GET['year'] && $_GET['month'])
                    <div class="col-md-4">
                        <form action="{{ route('admin.set.active.event') }}" method="POST">
                            <!-- @csrf -->
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <input type="hidden" value="{{$_GET['year']}}" name="year">
                            <input type="hidden" value="{{$_GET['month']}}" name="month">
                            <div class="input-group">
                                <button class="button uk-button-success ml-auto px-3 py-2" type="submit">Set Event Calender</button>
                                <br>
                                <small>Note : klik untuk tampilkan kalender yang dipilih</small>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <form action="{{ route('admin.set.auto.event') }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="void" value="0">
                                <button class="button uk-button-warning ml-auto px-3 py-2" type="submit">set Calender automatically</button>
                                <br>
                                <small>Note : klik untuk tampilkan kalender yang berjalan secara otomatis</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br>
            <script>
                $(document).ready(function() {
                    $('#year').on('change', function() {
                        $('#month').css('visibility', 'visible');
                    });

                    $('#monthsel').on('change', function() {
                        var year = $("#year").val();
                        var month = $("#monthsel").val();
                        var url = '{{ url("admin/event")}}' + '?year=' + year + '&month=' + month;
                        // alert(url);
                        if (url != window.location.href) {
                            window.location.href = url;
                        }

                    });
                });
            </script>
            <table class="table table-default all-events table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Activity Information</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($beritas as $berita)
                    <?php
                    // print_r($berita);
                    // die();
                    ?>
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
                        <td>{{$berita->description}}</td>
                        <td>
                            <?php
                            if ($berita->month == '1') {
                                $monthName = 'Januari';
                            } elseif ($berita->month  == '2') {
                                $monthName = 'Februari';
                            } elseif ($berita->month  == '3') {
                                $monthName = 'Maret';
                            } elseif ($berita->month  == '4') {
                                $monthName = 'April';
                            } elseif ($berita->month  == '5') {
                                $monthName = 'Mei';
                            } elseif ($berita->month  == '6') {
                                $monthName = 'Juni';
                            } elseif ($berita->month  == '7') {
                                $monthName = 'Juli';
                            } elseif ($berita->month  == '8') {
                                $monthName = 'Agustus';
                            } elseif ($berita->month  == '9') {
                                $monthName = 'September';
                            } elseif ($berita->month  == '10') {
                                $monthName = 'Oktober';
                            } elseif ($berita->month  == '11') {
                                $monthName = 'November';
                            } elseif ($berita->month  == '12') {
                                $monthName = 'Desember';
                            }
                            ?>
                            {{$monthName}}
                        </td>
                        <td>
                            <?php
                            if ($berita->year == '4') {
                                $year = '2023';
                            } elseif ($berita->year == '5') {
                                $year = '2024';
                            } elseif ($berita->year == '6') {
                                $year = '2025';
                            } elseif ($berita->year == '7') {
                                $year = '2026';
                            } elseif ($berita->year == '8') {
                                $year = '2027';
                            } elseif ($berita->year == '9') {
                                $year = '2028';
                            } elseif ($berita->year == '10') {
                                $year = '2029';
                            } elseif ($berita->year == '11') {
                                $year = '2030';
                            } elseif ($berita->year == '12') {
                                $year = '2031';
                            } elseif ($berita->year == '13') {
                                $year = '2032';
                            } elseif ($berita->year == '14') {
                                $year = '2033';
                            } elseif ($berita->year == '15') {
                                $year = '2034';
                            } elseif ($berita->year == '16') {
                                $year = '2035';
                            } elseif ($berita->year == '1') {
                                $year = '2020';
                            } elseif ($berita->year == '2') {
                                $year = '2021';
                            } elseif ($berita->year == '3') {
                                $year = '2022';
                            }
                            ?>
                            {{$year}}
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
                                <a href="{{ route('admin.change.artikel.event', encrypt($berita->id)).'/0' }}">
                                    <!-- <i class="icofont-pen-alt-1"></i> -->
                                    unpublish
                                </a>
                            </div>
                            @else
                            <div class="button soft-success">
                                <a href="{{ route('admin.change.artikel.event', encrypt($berita->id)).'/1' }}">
                                    <!-- <i class="icofont-pen-alt-1"></i> -->
                                    publish
                                </a>
                            </div>
                            <div class="button soft-danger"><a href="{{ route('admin.delete.artikel.event', encrypt($berita->id)) }}" onclick="return confirm('Are you Sure delete this article?')"><i class="icofont-trash"></i></a></div>
                            @endif
                            <div class="button soft-primary"><a href="{{ route('admin.edit.artikel.event', encrypt($berita->id)) }}"><i class="icofont-pen-alt-1"></i></a></div>
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
                url: '{{ url("admin/status-event/")}}' + '/' + id,
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