<?php

namespace App\Linklist;

/**
 * Class Node
 *
 * @package App\SF
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class Node
{

    private array $data;

    public ?Node $prv;

    public ?Node $next;

    public function __construct(array $data)
    {
        $this->next = null;
        $this->prv  = null;
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function __clone()
    {
        $this->prv  = null;
        $this->next = null;
    }
}
