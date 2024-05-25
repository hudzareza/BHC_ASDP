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
        date_default_timezone_set('Asia/Jakarta');
        // count user 
        $user = User::all()->sortByDesc('id');
        $user = json_decode(json_encode($user), true);
        $userCount = count($user);

        // end count 

        if (!empty($_GET['startdate'])) {
            $start_date = $_GET['startdate'];
            $end_date = $_GET['enddate'];
            $result = Goers::whereBetween('schedule_date', [$start_date, $end_date])->get();
        } else {
            $result = Goers::all()->sortByDesc('id');
        }


        return view('admin.dashboard.report', compact('result', 'userCount'));
    }

    public function csv()
    {
        date_default_timezone_set('Asia/Jakarta');
        $fileName = 'goers-report';
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
            $result = Goers::whereBetween('schedule_date', [$start_date, $end_date])->get();
        } else {
            $result = Goers::all()->sortByDesc('id');
        }


        $tasks = json_decode(json_encode($result), true);

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fprintf($file, "\xEF\xBB\xBF");
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row['Order Number']  = cleanValue($task['order_number']);
                $row['Item Content']    = cleanValue($task['item_content']);
                $row['Item Group']    = cleanValue($task['item_group']);
                $row['Item Name']  = cleanValue($task['item_name']);
                $row['Item Total']  = strval($task['item_total']);
                $row['Item Price']  = strval($task['item_price']);
                $row['Item Total Price']  = strval($task['item_total_price']);
                $row['Item Total Tax']  = strval($task['item_total_tax']);
                $row['Item Total Price Before Tax']  = strval($task['item_total_price_before_tax']);
                $row['Order By']  = cleanValue($task['order_by']);
                $row['Status']  = cleanValue($task['status']);
                $row['Schedule Date']  = cleanValue($task['schedule_date']);
                $row['Schedule Datetime']  = cleanValue($task['schedule_datetime']);
                $row['Created At']  = cleanValue($task['created_at']);
                $row['Payment Method']  = cleanValue($task['payment_method']);

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
                fwrite($file, "\n");
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    // Fungsi untuk membersihkan nilai dari karakter khusus
    function cleanValue($value)
    {
        // Daftar karakter khusus yang ingin diganti atau dihapus
        $specialCharacters = array(',', '"', "'", "\n", "\r");

        // Ganti karakter khusus dengan karakter yang aman
        $cleanValue = str_replace($specialCharacters, '', $value);

        return $cleanValue;
    }

    function addLeadingCharacter($value)
    {
        // Tambahkan karakter khusus di depan nilai
        return "'" . $value;
    }
}
