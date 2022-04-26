<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Alzee\Fwc\Fwc;

class Contacts
{
    private $token;
    private $API_URL;
    
    public function __construct($token)
    {
        $this->token = $token;
        $this->API_URL = FWC::$API_URL;
    }

    public function list()
    {
        $api =  "/tag/list";
        $query = "?access_token=$token";
        $data = $this->request($api . $query);
        if ($data->errcode === 0) {
            return $data->access_token;
        } else {
            return $data;
        }
    }
}

