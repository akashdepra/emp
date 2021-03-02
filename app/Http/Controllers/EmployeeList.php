<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeList extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get()
    {
        $token = $this->request->input('token');
        $search = $this->request->input('search');
        $user_data = [];
        if ($token) {
            $user_data = $this->getUsers();
        }

        if ($search) {
            $searched_data = [];
            foreach ($user_data as $key => $value) {
                if (strpos(strtolower($value['first_name']), strtolower($search)) !== false || strpos(strtolower($value['last_name']), strtolower($search)) !== false) {
                    $searched_data[] = $value;
                }
            }
            $user_data = $searched_data;
        }

        $response = [
            'status' => 200,
            'user_data' => $user_data
        ];
        return response()->json($response);
        // die();
    }

    public function getUsers()
    {
        return [
            [
                "emp_id" => 101,
                "first_name" => "Rahul",
                "middle_name" => "M",
                "last_name" => "Sharma",
                "salary" => "1000",
                "employment_type" => "permanent"
            ],
            [
                "emp_id" => 102,
                "first_name" => "Dozi",
                "middle_name" => "Caren",
                "last_name" => "Shah",
                "salary" => "700",
                "employment_type" => "permanent"
            ],
            [
                "emp_id" => 103,
                "first_name" => "Mitali",
                "middle_name" => "",
                "last_name" => "Raj",
                "salary" => "1500",
                "employment_type" => "permanent"
            ],
            [
                "emp_id" => 104,
                "first_name" => "Vivek",
                "middle_name" => "",
                "last_name" => "Jain",
                "salary" => "1100",
                "employment_type" => "permanent"
            ],
            [
                "emp_id" => 105,
                "first_name" => "Sachin",
                "middle_name" => "",
                "last_name" => "Bassi",
                "salary" => "950",
                "employment_type" => "permanent"
            ],
            [
                "emp_id" => 106,
                "first_name" => "Stuart",
                "middle_name" => "",
                "last_name" => "Broad",
                "salary" => "1300",
                "employment_type" => "permanent"
            ]
        ];
    }
}
