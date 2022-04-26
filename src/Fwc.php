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
    private $API_URL = "https://qyapi.weixin.qq.com/cgi-bin";
    
    public function __construct()
    {
    }

    public function getAccessToken($corpid, $secret)
    {
        $api = "/gettoken";
        $query = "?corpid=$corpid&corpsecret=$secret";
        $response = $this->request($api . $query);
        $data = json_decode($response->getContent());
        if ($data->errcode === 0) {
            return $data->access_token;
        } else {
        }
    }

    public function request($api, $body = null, $method = 'GET')
    {
        $httpClient = HttpClient::create();
        $headers = [];

        if (is_null($body)) {
            $payload = [];
        } else {
            $method = 'POST';
            $payload = [
                // 'headers' => $headers,
                'body' => $body
            ];
        }

        $response = $httpClient->request(
            $method,
            $this->API_URL . $api,
            $payload
        );

        // $content = $response->getContent();
        return $response;
    }
}
