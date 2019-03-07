<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/7
 * Time: 11:24
 */

namespace Pth\Notifications;

use \Pth\Contracts\Notifications\Notification as NotificationImp;

class Notification implements NotificationImp
{
    public function __construct()
    {
        echo config('pth.notifications.dingtalk.webhook');exit;
    }

    public function channel($name = '')
    {
        // TODO: Implement channel() method.
    }

    public function send($notification)
    {
        // TODO: Implement send() method.
    }
}