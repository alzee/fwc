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
    
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function list()
    {
        $api =  "/tag/list";
        $query = "?access_token=$this->token";
        $data = Fwc::request($api . $query);
        if ($data->errcode === 0) {
            return $data->taglist;
        } else {
            return $data;
        }
    }
}

