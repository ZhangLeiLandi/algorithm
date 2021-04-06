<?php
/**
 * TreeTest.php.
 *
 * @author  zhanglei <zhanglei@huikeyun.com>
 */

namespace Test\Tree;

use App\Tree\Tree;
use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{

    public function testInitTree()
    {

        $array = [1,2,3,4,5,6];
        $tree = new Tree();
        $treeNode = $tree->creatTree($array);

        echo "前序遍历 ===>>> \r\n";
        $tree->preErgodic($treeNode);
        echo "中序遍历 ===>>> \r\n";
        $tree->inErgodic($treeNode);
        echo "后续遍历 ===>>> \r\n";
        $tree->afterErgodic($treeNode);
        echo "广度遍历 ===>>> \r\n";
        $tree->initQueue();
        $tree->gdErgodic($treeNode);

    }

}
