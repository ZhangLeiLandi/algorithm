<?php

namespace App\Linklist;


use Exception;


class LinkedList
{

    public ?Node $head;

    public ?Node $last;

    private int $length;


    public function __construct()
    {
        $this->head   = null;
        $this->last   = null;
        $this->length = 0;
    }


    /**
     * 初始化链表
     * initList
     *
     *
     * @author zhanglei@huikeyun.com
     */
    public function initList()
    {

        $this->clearList();
    }

    /**
     * 判断链表是否为空
     * listEmpty
     *
     * @return bool
     *
     * @author zhanglei@huikeyun.com
     */
    public function listEmpty(): bool
    {
        return !$this->length;
    }

    /**
     * 清空链表
     * clearList
     *
     * @author zhanglei@huikeyun.com
     */
    public function clearList()
    {
        $this->length = 0;
        if (!$this->head) {
            return;
        }

        $node       = $this->head;
        $this->head = null;
        $this->last = null;

        while ($node) {
            if ($node->prv) {
                unset($node->pre);
            }
            $node = $node->next;
        }

    }


    /**
     * 查找一个节点
     * getNode
     *
     * @param int $index
     * @return Node|null
     *
     * @author zhanglei@huikeyun.com
     */
    public function getNode(int $index): ?Node
    {
        //位置异常
        if ($index > $this->length || $index <= 0) {
            return null;
        }
        //指向最后一个节点
        if ($index == $this->length) {
            return $this->last;
        }

        $node = $this->head;
        while (--$index) {
            $node = $node->next;
        }

        return $node;
    }


    /**
     * 检查一个节点是否存在
     * locateNode
     *
     * @param Node $node
     * @return int
     *
     * @author zhanglei@huikeyun.com
     */
    public function locateNode(Node $node): int
    {
        $index     = 0;
        $innerNode = $this->head;
        while ($innerNode) {
            $index++;
            if ($innerNode->getData() == $node->getData())
                return $index;
            $innerNode = $innerNode->next;
        }

        return 0;
    }


    /**
     * 链表插入
     * listInsert
     *
     * @param int $index
     * @param Node $node
     *
     * @throws Exception
     * @author zhanglei@huikeyun.com
     */
    public function listInsert(int $index, Node $node)
    {
        $node = clone $node;

        $maxInertAble = $this->length + 1;

        if ($this->length && $index > $maxInertAble) {
            throw new Exception("插入位置超过了必须连续");
        }

        $innerNode = $this->getNode($index);
        if (!$innerNode) {
            if ($index == 1) {
                $this->head = $node;
                $this->last = $node;
            } elseif ($index == $maxInertAble) {
                $this->last->next = $node;
                $node->prv        = $this->last;
                $this->last       = $node;
            }
        } else {

            $node->next           = $innerNode;
            $node->prv            = $innerNode->prv;
            $innerNode->prv->next = $node;
            $innerNode->prv       = $node;
        }

        $this->length++;
    }

    /**
     * 删除节点
     * ListDelete
     *
     * @param int $index
     * @return bool
     *
     * @author zhanglei@huikeyun.com
     */
    public function listDelete(int $index): bool
    {
        if ($index > $this->length) {
            return false;
        }

        $node            = $this->getNode($index);
        $node->prv->next = $node->next;
        $node->next->prv = $node->prv;

        unset($node);
        return true;
    }

    public function listLength(): int
    {
        return $this->length;
    }

}



