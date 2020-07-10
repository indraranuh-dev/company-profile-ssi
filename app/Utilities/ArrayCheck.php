<?php

namespace App\Utilities;

class ArrayCheck
{
    /**
     * Fungsi ini digunakan untuk membandingkan fullarray dengan arrayselected
     * Berdasarkan perbandingan antara fullarray dan arrayselected, fungsi
     * Akan megembalikan array baru yang tidak terdapat pada fullarray
     *
     * @param object $fullArray
     * @param object $arraySelected
     *
     * @return array
     */

    public static function notSelected(object $fullArray, object $arraySelected)
    {
        $all = [];
        $countValues = [];
        $selectedArr = [];
        $notSelectedArr = [];

        foreach ($fullArray as $full) array_push($all, ['id' => $full['id'], 'name' => $full['name']]);
        foreach ($arraySelected as $selected) array_push($all, ['id' => $selected['id'], 'name' => $selected['name']]);

        $count = array_count_values(array_column($all, 'id'));
        foreach ($count as $cIndex => $c) array_push($countValues, ['id' => $cIndex, 'total' => $c]);

        foreach ($fullArray as $fIndex => $full) {
            foreach ($count as $i => $c) {
                ($full['id'] === $i && $c === 1)
                    ? array_push($notSelectedArr,  ['id' => $full['id'], 'name' => $full['name']])
                    : false;
                ($full['id'] === $i && $c === 2)
                    ? array_push($selectedArr,  ['id' => $full['id'], 'name' => $full['name']])
                    : false;
            }
        }

        return [
            'selected' => array_reverse($selectedArr),
            'notSelected' => array_reverse($notSelectedArr),
        ];
    }
}
