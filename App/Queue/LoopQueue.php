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

    private int $length;

    public function __construct(int $size)
    {
        $this->size   = $size;
        $this->front  = 0;
        $this->rear   = 0;
        $this->length = 0;
    }

    /**
     * enQueue
     *
     * @param  $element
     *
     * @throws \Exception
     * @author zhanglei@huikeyun.com
     */
    public function enQueue( $element)
    {
        if (($this->rear + 1) % $this->size === $this->front) {
            throw new \Exception("队列已满！");
        }

        $this->array[$this->rear] = $element;
        $this->rear               = ($this->rear + 1) % $this->size;
        $this->length++;
    }

    /**
     * deQueue
     *
     *
     * @throws \Exception
     * @author zhanglei@huikeyun.com
     */
    public function deQueue()
    {
        if ($this->rear == $this->front) {
            throw new \Exception("队列已空！");
        }

        $deQueueElement = $this->array[$this->front];
        $this->front    = ($this->front + 1) % $this->size;
        $this->length--;
        return $deQueueElement;
    }


    public function outPut()
    {
        for ($i = $this->front; $i != $this->rear; $i = ($i + 1) % $this->size) {
            echo sprintf("%10d \r\n", $this->array[$i]->getData());
        }
    }

    public function lenght()
    {
        return $this->length;
    }
}
