<?php

namespace App\Foundation;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Arrayable;

/**
 * 通用接口返回模板，将错误码和数据通过该类渲染之后，然后返回
 *
 * Class Response
 * @package App\Foundation
 * @Date    : 2021-10-31 20:34
 * @Author  : zhuhonggen
 */
class Response implements Arrayable
{
    public $errno;  //请求错误码
    public $errmsg;  //错误原因
    public $data;  //请求的具体数据
    protected $handler = [];

    public function __construct($code, $msg = "", $data = [])
    {
        $this->errno = $code;
        $this->errmsg  = $msg;
        $this->data = $data;
    }

    // 返回成功
    public static function success($data = [],$msg = '')
    : Response
    {
        if ($data instanceof Response) {
            return $data;
        }

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        return new static(ResponseCode::OK, $msg, $data);
    }

    // 返回失败
    public static function error($code = ResponseCode::ERROR, $msg = '', $data = [])
    : Response
    {
        if ($data instanceof Response) {
            return $data;
        }

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        return new static($code, $msg, $data);
    }

    // 是否成功
    public function isSuccess($code = [])
    : bool
    {
        $code = array_merge([ResponseCode::OK], $code);

        return in_array($this->errno, $code);
    }

    // 是否失败
    public function isFailed($code = [])
    : bool
    {
        return !$this->isSuccess($code);
    }

    /**
     * 获取元数据
     * @param string|array $field 传入字符串并且未传入default的话,如果没获取到值会返回null;
     *                            传入数组会返回数组中key取到的值,啥都没获取到会返回[]
     * @param  mixed $default
     * @return array|mixed|null
     */
    public function getRawData($field = null, $default = null)
    {
        if (is_string($field) || is_int($field)) {
            return Arr::get($this->data, $field, $default);
        } else if (is_array($field)) {
            return Arr::only($this->data, $field);
        }

        return $this->data;
    }

    public function setRawData($key = null, $data = null)
    {
        if(is_null($key) && is_null($data))
            return;

        if (!empty($key))
            $this->data[$key] = $data;
        else
            $this->data = $data;
    }

    /**
     * 添加处理者(处理者处理数据后必须以数组形式返回)
     * @param $handler
     * @return $this
     * @date
     */
    public function addHandler($handler)
    : Response
    {
        if (!is_array($handler)) {
            $handler = [$handler];
        }

        $this->handler = array_merge($this->handler, $handler);

        return $this;
    }

    // 获取加工后的数据
    public function getData()
    {
        $data = $this->getRawData();

        if (count($this->handler) > 0) {
            foreach ($this->handler as $processor) {
                $data = is_callable($processor) ? $processor($data) : $processor->handler($data);
            }
        }

        return $data;
    }

    // 处理返回消息
    protected function _formatMessage()
    {
        if (empty($this->errmsg)) {
            return isset(ResponseCode::$codeMsg[$this->errno]) ? ResponseCode::$codeMsg[$this->errno] : '';
        }

        if (Str::startsWith($this->errmsg, ',') && isset(ResponseCode::$codeMsg[$this->errno])){
            return ResponseCode::$codeMsg[$this->errno] . $this->errmsg;
        }

        return $this->errmsg;
    }

    public static function set($rsp)
    {
//        if ($rsp instanceof Response) {
//            return $rsp;
//        }
//        return new static((array)$message, $response, $messageArgs);
    }

    /**
     * @param string|array $field 传入字符串并且未传入default的话,如果没获取到值会返回true;
     *                            传入数组会返回数组中key取到的值,啥都没获取到会返回true
     * @param  mixed $default
     * @return bool
     */
    public function rawDataIsEmpty($field = null, $default = null)
    : bool
    {
        if (is_string($field)) {
            return empty(Arr::get($this->data, $field, $default));
        } else if (is_array($field)) {
            return empty(Arr::only($this->data, $field));
        }

        return empty($this->data);
    }

    public function getMessage()
    {
        return $this->_formatMessage();
    }

    public function toArray()
    : array
    {
        $data = [
            'errno'  => $this->errno,
            'errmsg' => $this->_formatMessage(),
            'time'   => time(),
//            'consume'=> intval(ceil(microtime(true) * 1000) - Context::get('request_at')),
            'data'   => $this->getData(),
        ];
        if (is_array($data['data']) && empty($data['data']))
            $data['data'] = new \stdClass();

        return $data;
    }

    public function __toString()
    {
        return json_encode($this->toArray());
    }
}

