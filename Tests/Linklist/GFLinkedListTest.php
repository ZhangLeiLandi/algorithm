<?php
/**
 * GFLLinkedListTest.php.
 *
 * @author  zhanglei <zhanglei@huikeyun.com>
 */

namespace Test\Linklist;

use App\Linklist\GFLinkedList;
use PHPUnit\Framework\TestCase;

class GFLinkedListTest extends TestCase
{

    public function testGFLinkedList()
    {

        $link = new GFLinkedList();
        $link->insert(10, 0);
        $link->insert(20, 1);
        $link->insert(30, 2);
        $link->insert(40, 3);
        $link->insert(50, 4);
        $link->insert(60, 5);
        $link->insert(70, 6);
        $link->insert(80, 7);
        $link->insert(90, 1);
        $link->insert(100, 3);
        $link->output();
    }

}
