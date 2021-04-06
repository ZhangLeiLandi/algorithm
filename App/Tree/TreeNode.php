<?php

namespace App\Tree;

/**
 * Class TreeNode
 *
 * @package App\Tree
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class TreeNode
{

    private int $data;

    public ?TreeNode $leftChild;

    public ?TreeNode $rightChild;

    public function __construct(int $data)
    {
        $this->data       = $data;
        $this->leftChild  = null;
        $this->rightChild = null;

    }

    public function getData(): int
    {
        return $this->data;
    }

}
