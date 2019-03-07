<?php
/**
 * Created by PhpStorm.
 * User: Eii
 * Date: 2019/3/6
 * Time: 17:11
 */

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Pth\Notifications\Notification;
use Pth\Search\Search;

class ESTest extends TestCase
{

    public function testA()
    {
        new Notification();
        $stack = new Search();
        $this->assertEmpty($stack->search(''));
        dd($stack->search(''));
        return $stack;
    }
}