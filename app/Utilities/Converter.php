<?php

namespace App\Utilities;

use Illuminate\Support\Carbon;

class Converter
{
    /**
     * Date formatter using Carbon
     *
     * @param string $date
     * @uses Illuminate\Support\Carbon\Carbon::parse
     * @return response
     */

    public static function convertDate(string $date): string
    {
        $newDate = Carbon::parse($date);
        if (strlen($date) <= 10) return $newDate->format('d, M Y');
        elseif (strlen($date) > 10) return $newDate->format('d M Y H:i');
        return '-';
    }

    /**
     * Currency formatter
     *
     * @param integer $price
     * @return void
     */
    public static function currency(int $price)
    {
        $currency = "Rp. " . number_format($price, 2, ',', '.');
        ($price !== null)
            ? $currency
            : 'Rp. -';
    }

    /**
     * Generating boolean value. active or not ?
     *
     * @param integer $value
     * @return void
     */
    public static function activeOrNot($value)
    {
        if (is_int($value))
            switch ($value) {
                case 0:
                    return '<span class="badge badge-default">Tidak Aktif</span>';
                    break;

                case 1:
                    return '<span class="badge badge-secondary">Aktif</span>';
                    break;

                default:
                    return '<span class="badge badge-warning">Unknown format</span>';
                    break;
            }
        switch ($value) {
            default:
                return '<span class="badge badge-warning">Unknown format</span>';
                break;
        }
    }
}