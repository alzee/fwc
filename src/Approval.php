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

    public function getFieldValue($sp_no, $field){
        $data = $this->getDetail($sp_no);
        $contents = $data->info->apply_data->contents;
        $arr = array_column($contents, 'title');
        $arr = array_column($arr, 0);
        $arr = array_column($arr, 'text');
        $index = array_search($field, $arr);
        $value = match ($contents[$index]->control) {
            'Textarea' => $contents[$index]->value->text,
            'Text' => $contents[$index]->value->text,
            'Number' => $contents[$index]->value->new_number,
        };
        return $value;
    }
}
