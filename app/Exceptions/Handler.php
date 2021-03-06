<?php

namespace App\Exceptions;

use App\Foundation\Response;
use App\Foundation\ResponseCode;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        //控制器参数异常错误
        if ($exception instanceof ControllerParamsException) {
            return response()->json(Response::error(ResponseCode::ERROR_CONTROLLER_PARAM_INVALID, $exception->getMessage())->toArray());
        }

        //输入无效的路由
        if ($exception instanceof NotFoundHttpException || $exception instanceof MethodNotAllowedHttpException) {
            return response()->json(Response::error(ResponseCode::ERROR_HTTP_NOT_FOUND, $exception->getMessage())->toArray());
        }
        return parent::render($request, $exception);
    }
}
