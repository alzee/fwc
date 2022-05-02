<?php
/**
 * vim:ft=php et ts=4 sts=4
 * @author Al Zee <z@alz.ee>
 * @version
 * @todo
 */

namespace Alzee\Fwc;

use Alzee\Fwc\Fwc;

class Media
{
    private $token;
    
    public function __construct($token)
    {
        $this->token = $token;
    }
    
    public function upload($file, $type)
    {
        $api = "/media/upload";
        $query = "?access_token=$this->token&type=$type";

        // $data = Fwc::request($api . $query, $body);

        // return $data;
    }
}

