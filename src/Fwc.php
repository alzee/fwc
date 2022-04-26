<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Symfony\Component\HttpClient\HttpClient;

// use What;

class Fwc
{
    
    public function __construct()
    {
    }

    public function getAccessToken($corpid, $secret)
    {
        $api = "/gettoken";
        $query = "?corpid=$corpid&corpsecret=$secret";
        $data = $this->request($api . $query);
        if ($data->errcode === 0) {
            return $data->access_token;
        } else {
            return $data;
        }
    }

    public static function request($api, $body = null, $method = 'GET')
    {
        $API_URL = "https://qyapi.weixin.qq.com/cgi-bin";
        $httpClient = HttpClient::create();
        $headers = [];

        if (is_null($body)) {
            $payload = [];
        } else {
            $method = 'POST';
            $payload = [
                // 'headers' => $headers,
                'json' => $body
            ];
        }

        $response = $httpClient->request(
            $method,
            $API_URL . $api,
            $payload
        );

        return json_decode($response->getContent());
    }
}
