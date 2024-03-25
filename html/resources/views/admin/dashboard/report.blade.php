@extends('admin.dashboard.index')

@section('title', 'Goers Report')

@section('page-breadcrumb')
<li><a href="{{ route('admin.list.artikel.faq') }}" title="">Goers Report</a></li>
@endsection

@section('custom-css')

@endsection

@section('content-title')

<div class="row mb-2">
    <div class="col-5 d-flex align-items-center">
        Goers Report
    </div>
    <div class="col-2 d-flex align-items-right">

    </div>
    <div class="col-4">
        <form action="{{route('admin.report')}}" method="get">
            @csrf
            <div class="row">
                <div class="col-2 d-flex align-items-center">
                </div>
                <div class="col-10 d-flex align-items-center">
                    <div class="input-group date" data-provide="datepicker">
                        <input type="date" name="date" value="" class="form-control" data-date-format="yyyy-mm-dd" />
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {
        $('input[name="date"]').daterangepicker();
        $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate.format('YYYY-MM-DD');
            var end = picker.endDate.format('YYYY-MM-DD');
            var url = '{{ url("admin/report")}}?startdate=' + start + '&enddate=' + end;
            //   console.log(url);
            if (url != window.location.href) {
                window.location.href = url;
            }
        });
    });
</script>
<div class="row mb-2">
    <div class="col-5">
        <button id="btnExport" class="btn btn-success btn-sm">Export to CSV</button>

        <!-- @if(isset($_GET['date']))
    <a class="btn btn-success btn-sm" href="{{route('admin.report.csv')}}?date={{$_GET['date']}}">Export to CSV</a>
    @else
    <a class="btn btn-success btn-sm" href="{{route('admin.report.csv')}}">Export to CSV</a>
    @endif -->

    </div>
    <div class="col-3"></div>
    <div class="col-4">

    </div>
</div>
@endsection
@section('content')
<div class="row merged20 mb-4">
    <?php


    $arrData = json_decode(json_encode($result), true);
    $colArrPrice = array_column($arrData, 'item_total_price');
    $colArrItem = array_column($arrData, 'item_total');
    $totalPrice = array_sum($colArrPrice);
    $totalItem = array_sum($colArrItem);
    ?>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="d-widget soft-green">
            <div class="d-widget-title">
                <h5>Total Pemesanan</h5>
            </div>
            <div class="d-widget-content">
                <span class="realtime-ico pulse"></span>
                <h5>{{count($arrData)}}</h5>
                <i class="icofont-optic"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="d-widget soft-blue">
            <div class="d-widget-title">
                <h5>Total Pendapatan</h5>
            </div>
            <div class="d-widget-content">
                <span class="realtime-ico pulse"></span>
                <h5>{{$totalPrice}}</h5>
                <i class="icofont-optic"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="d-widget soft-green">
            <div class="d-widget-title">
                <h5>Total Item</h5>
            </div>
            <div class="d-widget-content">
                <span class="realtime-ico pulse"></span>
                <h5>{{$totalItem}}</h5>
                <i class="icofont-optic"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3">
        <a href="">
            <div class="d-widget soft-red">
                <div class="d-widget-title">
                    <h5>Total User</h5>
                </div>
                <div class="d-widget-content">
                    <span class="realtime-ico pulse"></span>
                    <h5>{{$userCount}}</h5>
                    <i class="icofont-optic"></i>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="row merged20 mb-4">
    <div class="col-lg-12">
        <div class="d-widget">
            <table class="table table-default all-events table-striped table-responsive-lg">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Item Content</th>
                        <th>Item Group</th>
                        <th>Item Name</th>
                        <th>Item Total</th>
                        <th>Item Price</th>
                        <th>Item Total Price</th>
                        <th>Item Total Tax</th>
                        <th>Item Total Price Before Tax</th>
                        <th>Order By</th>
                        <th>Status</th>
                        <th>Schedule Date</th>
                        <th>Schedule Datetime</th>
                        <th>Created At</th>
                        <th>Payment Method</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($arrData as $list)
                    <tr>
                        <td>{{$list['order_number']}}</td>
                        <td>{{$list['item_content']}}</td>
                        <td>{{$list['item_group']}}</td>
                        <td>{{$list['item_name']}}</td>
                        <td>{{$list['item_total']}}</td>
                        <td>{{$list['item_price']}}</td>
                        <td>{{$list['item_total_price']}}</td>
                        <td>{{$list['item_total_tax']}}</td>
                        <td>{{$list['item_total_price_before_tax']}}</td>
                        <td>{{$list['order_by']}}</td>
                        <td>{{$list['status']}}</td>
                        <td>{{$list['schedule_date']}}</td>
                        <td>{{$list['schedule_datetime']}}</td>
                        <td>{{$list['created_at']}}</td>
                        <td>{{$list['payment_method']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function() {
        $("#btnExport").click(function() {
            let table = document.getElementsByTagName("table");
            console.log(table);
            debugger;
            TableToExcel.convert(table[0], {
                name: `goers-report.csv`,
                sheet: {
                    name: 'goers-report'
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                //Access - Control - Allow - Origin: *
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