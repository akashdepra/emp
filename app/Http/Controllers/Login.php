<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Login extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function authenticate()
    {
        $input_data = $this->request->input('username');
        $token = "";
        if ($input_data) {
            $token = $this->generate_token();
            setrawcookie("token", $token, time() + 60 * 60 * 24, '/', '', true);
        }
        $response = [
            'status' => 200,
            'token' => $token
        ];
        return response()->json($response);
        // die();
    }

    public function generate_token()
    {
        $length = 8;
        $timeStamp = time();
        $timeStamp = strval($timeStamp);
        $parts = str_split($timeStamp);
        $parts = array_reverse($parts);
        $id = [];

        for ($i=0; $i < $length; $i++) {
            $index = rand(0, count($parts) - 1) % 10;
            array_push($id, $index);
        }
        return implode("", $id);
    }
}
