<?php
/**
 * @desc  : 控制器参数异常
 * @Date  : 2021-10-31 20:46
 * @Author: zhuhonggen
 */

namespace App\Exceptions;

use App\Foundation\ResponseCode;
use Exception;
use Throwable;

class ControllerParamsException extends Exception
{
    public function __construct(string $message = "", int $code = ResponseCode::ERROR_CONTROLLER_PARAM_INVALID, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
