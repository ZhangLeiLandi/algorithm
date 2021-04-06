<?php

namespace App\Tree;

/**
 * Class Tree
 *
 * @package App\Tree
 *
 * @author zhanglei <zhanglei@huikeyun.com>
 */
class Tree
{


    public function initTree(array &$data): ?TreeNode
    {

        $treeNode = null;
        if (count($data) === 0) {
            return null;
        }

        $value = array_pop($data);
        if ($value !== null) {
            $treeNode             = new TreeNode($value);
            $treeNode->leftChild  = $this->initTree($data);
            $treeNode->rightChild = $this->initTree($data);
        }
        return $treeNode;
    }

    public function creatTree(array $data): ?TreeNode
    {
        $treeNode = null;
        if (count($data) === 0) {

            return $treeNode;
        }

        $value = array_pop($data);
        if ($value !== null) {
            $treeNode = new TreeNode($value);

            $treeNode->leftChild  = $this->creatTree(array_splice($data, 0, count($data) >> 1));
            $treeNode->rightChild = $this->creatTree($data);
        }
        return $treeNode;
    }


    public function preErgodic(?TreeNode $node)
    {
        if ($node === null) {

            return;
        }

        echo sprintf("%10d \r\n", $node->getData());
        $this->preErgodic($node->leftChild);
        $this->preErgodic($node->rightChild);

    }

    public function inErgodic(?TreeNode $node)
    {
        if ($node === null) {

            return;
        }

        $this->inErgodic($node->leftChild);
        echo sprintf("%10d \r\n", $node->getData());
        $this->inErgodic($node->rightChild);
    }

    public function afterErgodic(?TreeNode $node)
    {
        if ($node === null) {

            return;
        }

        $this->afterErgodic($node->leftChild);
        $this->afterErgodic($node->rightChild);
        echo sprintf("%10d \r\n", $node->getData());
    }

    /**
     * 广度优先算法
     * gdErgodic
     *
     * @param TreeNode|null $node
     *
     * @author zhanglei@huikeyun.com
     */
    public function gdErgodic(?TreeNode $node)
    {

    }
}
