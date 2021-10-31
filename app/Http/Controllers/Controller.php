<?php

namespace App\Http\Controllers;

use App\Exceptions\ControllerParamsException;
use App\Foundation\Validation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 通过依赖注入的方式将Request注入到控制器类中
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * 参数校验，如果不符合规则，则抛出异常
     *
     * @param array $rule
     * @param array $params
     * @param array $customAttributes
     * @throws \App\Exceptions\ControllerParamsException
     */
    public function checkParams(array $rule, array $params = [], array $customAttributes = [])
    {
        if (empty($params)) {
            $params = $this->request->all();
        }

        $validate = Validator::make($params, $rule, Validation::$msg, $customAttributes);
        if ($validate->fails()) {
            throw new ControllerParamsException(implode('', $validate->errors()->all()));
        }
    }
}
