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

    public function listTags()
    {
        $api = "/tag/list";
        $query = "?access_token=$this->token";
        $data = Fwc::request($api . $query);
        if ($data->errcode === 0) {
            return $data->taglist;
        } else {
            return $data;
        }
    }

    public function addUsersToTag($tid, $users = [])
    {
        $api = "/tag/addtagusers";
        $query = "?access_token=$this->token";
        $body = [
            "tagid" => $tid,
            "userlist" => $users,
            // "partylist": []
        ];
        $data = Fwc::request($api . $query, $body);
        if ($data->errcode === 0) {
            return $data;
        } else {
            return $data;
        }
    }

    public function delUsersFromTag($tid, $users = [])
    {
        $api = "/tag/deltagusers";
        $query = "?access_token=$this->token";
        $body = [
            "tagid" => $tid,
            "userlist" => $users,
            // "partylist": []
        ];
        $data = Fwc::request($api . $query, $body);
        if ($data->errcode === 0) {
            return $data;
        } else {
            return $data;
        }
    }
}
