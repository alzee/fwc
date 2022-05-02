<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Alzee\Fwc\Fwc;

class Chat
{
    private $token;
    
    public function __construct($token)
    {
        $this->token = $token;
    }
    
    public function sendTextTo($users, $content, $agentId)
    {
        $api = "/message/send";
        $query = "?access_token=$this->token";

        $msgType = 'text';

        $body = [
            "touser" => $users,
            "msgtype" => $msgType,
            "agentid" => $agentId,
            "text" => [
                "content" => $content
            ]

        ];
        $data = Fwc::request($api . $query, $body);

        return $data;
    }

    public function sendImgTo($users, $mediaId, $agentId)
    {
        $api = "/message/send";
        $query = "?access_token=$this->token";

        $msgType = 'image';

        $body = [
            "touser" => $users,
            "msgtype" => $msgType,
            "agentid" => $agentId,
            "image" => [
                "media_id" => $mediaId
            ]

        ];
        $data = Fwc::request($api . $query, $body);

        return $data;
    }
}

