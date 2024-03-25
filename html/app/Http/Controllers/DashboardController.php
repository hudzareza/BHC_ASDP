<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Goers;

class DashboardController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.dashboard.index');
    }

    public function quickAccess(): View
    {
        return view('admin.dashboard.quick');
    }

    public function report()
    {
        date_default_timezone_set('UTC');
        // count user 
        $user = User::all()->sortByDesc('id');
        $user = json_decode(json_encode($user), true);
        $userCount = count($user);

        // end count 

        if (!empty($_GET['startdate'])) {
            $start_date = $_GET['startdate'];
            $end_date = $_GET['enddate'];
        } else {
            // $start_date = date('Y-m-d');
            // $end_date = date('Y-m-d');
            $start_date = '2023-11-20';
            $end_date = '2023-11-30';
        }

        $result = Goers::whereBetween('schedule_date', [$start_date, $end_date])->get();

        return view('admin.dashboard.report', compact('result', 'userCount'));
    }

    public function csv()
    {
        date_default_timezone_set('UTC');
        $fileName = 'goers-report.csv';
        $headers = array(
            "Content-type"        => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns = array('Order Number', 'Item Content', 'Item Group', 'Item Name', 'Item Total', 'Item Price', 'Item Total Price', 'Item Total Tax', 'Item Total Price Before Tax', 'Order By', 'Status', 'Schedule Date', 'Schedule Datetime', 'Created At', 'Payment Method');

        // print_r($_GET);die();
        if (!empty($_GET['date'])) {
            $start_date = $_GET['date'];
            $end_date = $_GET['date'];
            // print_r($_GET);die();
        } else {
            // $start_date = date('Y-m-d');
            // $end_date = date('Y-m-d');
            $start_date = '2023-11-20';
            $end_date = '2023-11-30';
        }

        $result = Goers::whereBetween('schedule_date', [$start_date, $end_date])->get();

        $tasks = json_decode(json_encode($result), true);

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Order Number']  = $task['order_number'];
                $row['Item Content']    = $task['item_content'];
                $row['Item Group']    = $task['item_group'];
                $row['Item Name']  = $task['item_name'];
                $row['Item Total']  = $task['item_total'];
                $row['Item Price']  = $task['item_price'];
                $row['Item Total Price']  = $task['item_total_price'];
                $row['Item Total Tax']  = $task['item_total_tax'];
                $row['Item Total Price Before Tax']  = $task['item_total_price_before_tax'];
                $row['Order By']  = $task['order_by'];
                $row['Status']  = $task['status'];
                $row['Schedule Date']  = $task['schedule_date'];
                $row['Schedule Datetime']  = $task['schedule_datetime'];
                $row['Created At']  = $task['created_at'];
                $row['Payment Method']  = $task['payment_method'];

                fputcsv($file, array(
                    $row['Order Number'],
                    $row['Item Content'],
                    $row['Item Group'],
                    $row['Item Name'],
                    $row['Item Total'],
                    $row['Item Price'],
                    $row['Item Total Price'],
                    $row['Item Total Tax'],
                    $row['Item Total Price Before Tax'],
                    $row['Order By'],
                    $row['Status'],
                    $row['Schedule Date'],
                    $row['Schedule Datetime'],
                    $row['Created At'],
                    $row['Payment Method']
                ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
