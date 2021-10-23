<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTest(Request $request)
    : array
    {
        $name = $request->get('name');
        //        $env  = $_SERVER['ENV'];
        $env2 = env('APP_ENV');
        return [
            'name'    => $name,
            '_SERVER' => $_SERVER,
            'APP_ENV' => $env2
        ];
    }
}
