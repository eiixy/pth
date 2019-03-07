<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/7
 * Time: 11:13
 */

namespace Pth\Contracts\Notifications;


interface Notification
{
    /**
     * 发送通知信息
     * @param $notification
     * @return mixed
     */
    public function send($notification);

    public function channel($name = '');

}