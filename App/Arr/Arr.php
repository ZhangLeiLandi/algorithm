<?php

namespace App\Arr;

use Exception;

class Arr
{

    private int $size;

    private int $length;

    /** @var array $data */
    private array $data;

    public function __construct(int $size)
    {
        $this->length = 0;
        $this->size   = $size;
        $this->data   = [];
    }


    public function getElem(int $index): string
    {
        if ($index > $this->size || $index <= 1 || $index > $this->length) {
            throw new Exception("");
        }

        return $this->data[$index - 1];
    }

    /**
     * listInsert
     *
     * @param int $index
     * @param string $elem
     * @return bool
     *
     * @throws Exception
     * @author zhanglei@huikeyun.com
     */
    public function listInsert(int $index, string $elem): bool
    {

        if ($index > $this->size || $index <= 1 || $index > ($this->length + 1)) {
            throw new Exception("");
        }

        if ($index <= $this->length) {

            for ($k = $this->length - 1; $k > $index - 1; $k--) {

                $this->data[$k + 1] = $this->data[$k];
            }
        }

        $this->data[$index - 1] = $elem;
        $this->length++;
        return true;
    }


    public function listDelete(int $index): string
    {


        if (!$this->length || $index > $this->size || $index <= 1 || $index > ($this->length + 1)) {
            throw new Exception("");
        }

        $tmp = $this->data[$index - 1];

        if ($index <= $this->length) {
            for ($i = $index - 1; $i < $this->length; $i++) {
                $this->data[$i - 1] = $this->data[$i];
            }
        }

        $this->length--;
        return $tmp;
    }

}
