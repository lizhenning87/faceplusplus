<?php
/**
 * Created by PhpStorm.
 * User: lzning
 * Date: 2018/12/7
 * Time: 4:54 PM
 */

namespace Zning\FacePlus\plugins;


class OCRLicense
{


    public static function driverLicense($api_key, $api_secret, $base64) {

        $params['api_key'] = $api_key;
        $params['api_secret'] = $api_secret;
        $params['image_base64'] = $base64;

        $url = 'https://api-cn.faceplusplus.com/cardpp/v1/ocrvehiclelicense';

        $response = HttpUtil::doHttpPost($url, $params);

        return $response;
    }

}