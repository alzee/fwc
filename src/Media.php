<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Alzee\Fwc\Fwc;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

class Media
{
    private $token;
    
    public function __construct($token)
    {
        $this->token = $token;
    }
    
    public function upload($file, $type)
    {
        $API_URL = "https://qyapi.weixin.qq.com/cgi-bin";
        $api = "/media/upload";
        $query = "?access_token=$this->token&type=$type";

        $httpClient = HttpClient::create();

        $formFields = [
            // 'regular_field' => 'some value',
            'file_field' => DataPart::fromPath($file),
        ];
        $formData = new FormDataPart($formFields);
        $httpClient->request(
            'POST',
            $API_URL . $api,
            [
                'headers' => $formData->getPreparedHeaders()->toArray(),
                'body' => $formData->bodyToIterable(),
            ]
        );

        // $data = Fwc::request($api . $query, $body);

        // return $data;
    }
}

