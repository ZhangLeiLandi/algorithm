<?php

namespace App\Queue;


/**
 * Class LoopQueue
 *
 * @package App\Queue
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class LoopQueue
{

    private array $array;

    private int $front;

    private int $rear;

    private int $size;

    public function __construct(int $size)
    {
        $this->size  = $size;
        $this->front = 0;
        $this->rear  = 0;
    }

    /**
     * enQueue
     *
     * @param int $element
     *
     * @throws \Exception
     * @author zhanglei@huikeyun.com
     */
    public function enQueue(int $element)
    {
        if (($this->rear + 1) % $this->size === $this->front) {
            throw new \Exception("队列已满！");
        }

        $this->array[$this->rear] = $element;
        $this->rear               = ($this->rear + 1) % $this->size;
    }

    /**
     * deQueue
     *
     * @return int
     *
     * @throws \Exception
     * @author zhanglei@huikeyun.com
     */
    public function deQueue(): int
    {
        if ($this->rear == $this->front) {
            throw new \Exception("队列已空！");
        }

        $deQueueElement = $this->array[$this->front];
        $this->front    = ($this->front + 1) % $this->size;
        return $deQueueElement;
    }


    public function outPut()
    {
        for ($i = $this->front; $i != $this->rear; $i = ($i + 1) % $this->size) {
            echo sprintf("%10d \r\n", $this->array[$i]);
        }
    }
}
