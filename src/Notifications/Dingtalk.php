<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/7
 * Time: 11:12
 */

namespace Pth\Notifications;

use Pth\Contracts\Notification;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client;

class Dingtalk
{

    public function send($notification)
    {
        $client = new Client(['base_uri'=>'https://oapi.dingtalk.com']);
        $config = [
            'webhook'   =>  'https://oapi.dingtalk.com/robot/send?access_token=b092e8ceca15df5d16818e9ddad5fbe40eaab2dae78a984f5ad0a5460bf12c82',
            'msgtype'   =>  'markdown',
            'at'        =>  [
                'atMobiles' =>  [

                ],
                'isAtAll'   => false
            ]
        ];//config('pth.notifications.dingtalk');

        $content = [
            "msgtype" => $config["msgtype"],
            "markdown" => [
                "title" => "系统预警通知",
                "text" => $notification
            ],
            "at" => $config['at']
        ];
        $client->request('POST',$config['webhook'],[
            RequestOptions::JSON => $content
        ]);
        // TODO: Implement send() method.
    }

}