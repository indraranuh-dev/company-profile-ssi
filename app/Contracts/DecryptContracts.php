<?php

namespace App\Contracts;

use App\Utilities\Generator;

trait DecryptContracts
{
    /**
     * Decrypt contracts
     *
     * @param boolean $isArray
     * @param string $id
     * @param array $arr
     * @return void
     */
    protected function decrypt($isArray = false, $id = '', $arr = [])
    {
        if ($isArray === false) {
            return Generator::crypt($id, 'decrypt');
        } else {
            $newArr = [];
            foreach ($arr as $a) {
                array_push($newArr, Generator::crypt($a, 'decrypt'));
            }
            return $newArr;
        }
    }
}