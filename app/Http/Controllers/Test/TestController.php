<?php

namespace App\Http\Controllers\Test;

use App\Foundation\Response;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * @throws \App\Exceptions\ControllerParamsException
     */
    public function getTest()
    : Response
    {
        $rule = [
            'name' => 'required'
        ];
        $this->checkParams($rule);
        $name = $this->request->get('name');
        //        $env  = $_SERVER['ENV'];
        $env2 = env('APP_ENV');
        list($a, $b) = [22, 33];
        return Response::success([
            'name'    => $name,
            'a'       => $a,
            'b'       => $b,
            'config'  => config('app'),
            '_SERVER' => $_SERVER,
            'APP_ENV' => $env2
        ]);
    }
}
