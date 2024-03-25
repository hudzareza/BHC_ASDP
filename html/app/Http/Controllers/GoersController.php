<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


class GoersController extends Controller
{

    public function index()
    {
        error_reporting(0);
        date_default_timezone_set('UTC');

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');

        // $start_date = '2023-11-20';
        // $end_date = '2023-11-20';

        $auth = 'kf3AI7yNaUpIfK0eFnKBPaTgNEQA5l2Lfv91npULT1FT0wtEKqqJHvr33f2olsw5';
        $apikey = 'd2ecf23f-504b-4252-80e2-ed6a5800944d';

        $url = 'https://newapi.goersapp.com/v3.1/integration/order-schedule-reports?start_date=' . $start_date . '&end_date=' . $end_date;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: ' . $auth,
            'Api-Key: ' . $apikey,
            'G-Channel: 4'
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        if ($response == '0') {
            $data = [
                'kode' => http_response_code(400),
                'status' => 'terlalu banyak request'
            ];
        } else {
            $result = json_decode($response);
            foreach ($result->data->values as $key => $value) {
                $order_number = $value[0];
                $item_content = $value[1];
                $item_group = $value[2];
                $item_name = $value[3];
                $item_total = $value[4];
                $item_price = $value[5];
                $item_total_price = $value[6];
                $item_total_tax = $value[7];
                $item_total_price_before_tax = $value[8];
                $order_by = $value[9];
                $status = $value[10];
                $schedule_date = $value[11];
                $schedule_datetime = $value[12];
                $created_at = substr($value[13], 0, 19);
                $payment_method = $value[14];

                $find = DB::table('goers')
                    ->where('order_number', '=', $order_number)
                    ->get();

                $objJsonDocument = json_encode($find);
                $arrOutput = json_decode($objJsonDocument, TRUE);

                if (!empty($arrOutput)) {
                    $data = [
                        'kode' => http_response_code(200),
                        'status' => 'data sudah ada'
                    ];
                } else {
                    DB::table('goers')->insert([
                        'order_number' => $order_number,
                        'item_content' => $item_content,
                        'item_group' => $item_group,
                        'item_name' => $item_name,
                        'item_total' => $item_total,
                        'item_price' => $item_price,
                        'item_total_price' => $item_total_price,
                        'item_total_tax' => $item_total_tax,
                        'item_total_price_before_tax' => $item_total_price_before_tax,
                        'order_by' => $order_by,
                        'status' => $status,
                        'schedule_date' => $schedule_date,
                        'schedule_datetime' => $schedule_datetime,
                        'created_at' => $created_at,
                        'payment_method' => $payment_method
                    ]);

                    $data = [
                        'kode' => http_response_code(200),
                        'status' => 'berhasil insert'
                    ];
                }
            }

            return $data;
        }
        curl_close($ch);
    }
}
