<?php
/**
 * Created by PhpStorm.
 * User: lzning
 * Date: 2018/12/7
 * Time: 4:50 PM
 */

namespace Zning\FacePlus;

use Zning\FacePlus\Exceptions\InvalidArgumentException;
use Zning\FacePlus\plugins\OCRLicense;

class FacePlus
{

    protected $api_key;
    protected $api_secret;

    public function __construct($key, $secret)
    {
        if ($key == null || $key == '' || $secret == null || $secret == '')
        {
            throw new InvalidArgumentException("缺少配置参数,请确认services.php中的配置");
        }

        $this->api_key = $key;
        $this->api_secret = $secret;
    }


    public function ocr_driverLicense($base64) {

        if (self::_is_base64($base64) == false)
        {
            throw new InvalidArgumentException("图片必须为base64格式");
        }

        return OCRLicense::driverLicense($this->api_key, $this->api_secret, $base64);

    }


    // _is_base64 ：判断一个字符串是否经过base64
    // 参数说明
    //   - $str：待判断的字符串
    // 返回数据
    //   - 该字符串是否经过base64（true/false）
    private static function _is_base64($str)
    {
        return $str == base64_encode(base64_decode($str)) ? true : false;
    }



}