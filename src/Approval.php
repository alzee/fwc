<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Alzee\Fwc\Fwc;

class Approval
{
    private $token;
    
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getDetail($sp_no)
    {
        $api = "/oa/getapprovaldetail";
        $query = "?access_token=$this->token";
        $body = [
            "sp_no" => $sp_no
        ];
        $data = Fwc::request($api . $query, $body);
        if ($data->errcode === 0) {
            return $data;
        } else {
            return $data;
        }
    }
}
