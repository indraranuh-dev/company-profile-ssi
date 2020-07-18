<?php

namespace App\Model;

use App\Model\Entities\Counter;

class CounterModel
{
    /**
     * Get visitor this year per month
     *
     * @param string $year
     * @return json
     */
    public function thisYear($year = '')
    {
        $january = Counter::whereYear('created_at', $year)->whereMonth('created_at', '01')->count();
        $february = Counter::whereYear('created_at', $year)->whereMonth('created_at', '02')->count();
        $march = Counter::whereYear('created_at', $year)->whereMonth('created_at', '03')->count();
        $april = Counter::whereYear('created_at', $year)->whereMonth('created_at', '04')->count();
        $may = Counter::whereYear('created_at', $year)->whereMonth('created_at', '05')->count();
        $june = Counter::whereYear('created_at', $year)->whereMonth('created_at', '06')->count();
        $july = Counter::whereYear('created_at', $year)->whereMonth('created_at', '07')->count();
        $august = Counter::whereYear('created_at', $year)->whereMonth('created_at', '08')->count();
        $september = Counter::whereYear('created_at', $year)->whereMonth('created_at', '09')->count();
        $october = Counter::whereYear('created_at', $year)->whereMonth('created_at', '10')->count();
        $november = Counter::whereYear('created_at', $year)->whereMonth('created_at', '11')->count();
        $december = Counter::whereYear('created_at', $year)->whereMonth('created_at', '12')->count();

        return response()->json(
            [
                'title' => 'Data visitor tahun ' . $year,
                'message' => 'Sukses',
                'data' => [
                    'January' => $january,
                    'February' => $february,
                    'March' => $march,
                    'April' => $april,
                    'May' => $may,
                    'June' => $june,
                    'July' => $july,
                    'August' => $august,
                    'September' => $september,
                    'October' => $october,
                    'November' => $november,
                    'December' => $december
                ],
            ],
            200
        );
    }
}