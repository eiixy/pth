<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/6
 * Time: 17:11
 */

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Pth\Notifications\Dingtalk;
use Pth\Notifications\Notification;
use Pth\Search\Search;

class NotificationTest extends TestCase
{

    public function testA()
    {
        $notify = new Dingtalk();
        $response = $notify->send(1);
        dd($response);
        $this->assertIsBool(true);
    }
}