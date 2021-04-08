<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Date;

Class api{
    /**
     * Create an api response
     *
     * @param String $status_code
     * @param Array $data
     * @param String $custom_messsage = ''
     * @return json
     */
    public static function makeJsonResponse($status_code, $data, $custom_message = ''){
        $response = [
            'code' => $status_code,
            'status' => 'Success',
            'message' => 'No message',
            'timestamp' => Date::now(),
            'data' => $data
        ];

        switch($status_code){

            default:

            break;

            case 200:
                $response['message'] = 'Okay';
            break;

            case 400:
                $response['message'] = 'Bad request';
                $response['status'] = 'Failed';
            break;

            case 404:
                $response['message'] = 'Resource not found';
                $response['status'] = 'Failed';
            break;

            case 500:
                $response['message'] = 'Server error';
                $response['status'] = 'Error';

            break;
        }
        if($custom_message != ''){
            $response['message'].=': '.$custom_message;
        }
        return response()->json($response, $status_code);
    }
}

