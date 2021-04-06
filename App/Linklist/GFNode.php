<?php

namespace App\Linklist;

/**
 * Class GFNode
 *
 * @package App\Linklist
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class GFNode
{

    private int $data;

    public ?GFNode $next;


    public function __construct(int $data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function getData(): int
    {
        return $this->data;
    }
}
