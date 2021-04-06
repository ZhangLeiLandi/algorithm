<?php

namespace App\Linklist;

use Exception;

/**
 * Class GF_LinkedList
 *
 * @package App\Linklist
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class GFLinkedList
{


    protected ?GFNode $head;

    protected ?GFNode $last;


    private int $size;

    public function __construct()
    {
        $this->size = 0;
        $this->head = null;
        $this->last = null;
    }


    /**
     * insert
     *
     * @param int $data
     * @param int $index
     *
     * @throws Exception
     * @author zhanglei@huikeyun.com
     */
    public function insert(int $data, int $index)
    {

        if ($index < 0 || $index > $this->size) {
            throw new Exception("超出链表节点范围");
        }

        $insertNode = new GFNode($data);
        if ($this->size === 0) {
            //空链表
            $this->head = $insertNode;
            $this->last = $insertNode;
        } elseif ($index === 0) {
            //头插入
            $insertNode->next = $this->head;
            $this->head       = $insertNode;
        } elseif ($this->size === $index) {
            //插入尾部
            $this->last->next = $insertNode;
            $this->last       = $insertNode;
        } else {
            //中间插入
            $preNode          = $this->get($index - 1);
            $insertNode->next = $preNode->next;
            $preNode->next    = $insertNode;
        }
        $this->size++;
    }

    /**
     * delete
     *
     * @param int $index
     *
     * @throws Exception
     * @author zhanglei@huikeyun.com
     */
    public function delete(int $index)
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("超出链表节点范围");
        }

        if ($index == 0) {
            //头节点删除
            $removeNode = $this->head;
            $this->head = $removeNode->next;

        } elseif ($index == $this->size - 1) {
            //尾节点删除
            $preNode       = $this->get($index - 1);
            $preNode->next = null;
            $this->last    = $preNode;
            $removeNode    = $preNode;
        } else {
            $preNode       = $this->get($index - 1);
            $removeNode    = $preNode->next;
            $preNode->next = $removeNode->next;
        }

        $this->size--;
        return $removeNode;

    }


    public function getLength()
    {
        return $this->size;
    }

    /**
     * get
     *
     * @param int $index
     * @return GFNode|null
     *
     * @throws Exception
     * @author zhanglei@huikeyun.com
     */
    public function get(int $index): ?GFNode
    {
        if ($index < 0 || $index > $this->size) {
            throw new Exception("超出链表节点范围");
        }

        $temp = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $temp = $temp->next;
        }

        return $temp;
    }


    public function output()
    {
        $temp = $this->head;
        while ($temp->next) {
            echo sprintf("%10d \r\n", $temp->getData());
            $temp = $temp->next;
        }
    }
}
