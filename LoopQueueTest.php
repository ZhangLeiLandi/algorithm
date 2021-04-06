<?php
/**
 * LoopQueueTest.php.
 *
 * @author  zhanglei <zhanglei@huikeyun.com>
 */

namespace App\Queue;

use PHPUnit\Framework\TestCase;

class LoopQueueTest extends TestCase
{

    public function testQueue()
    {
        $queue = new LoopQueue(10);
        $queue->enQueue(10);
        $queue->enQueue(20);
        $queue->enQueue(30);
        $queue->enQueue(40);
        $queue->enQueue(50);
        $queue->enQueue(60);
        $queue->enQueue(70);
        $queue->enQueue(80);
        $queue->enQueue(90);
        $queue->deQueue();
        $queue->enQueue(100);
//        $queue->enQueue(110);
        $queue->outPut();
    }
}
