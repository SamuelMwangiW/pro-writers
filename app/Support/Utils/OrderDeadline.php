<?php


namespace App\Support\Utils;


class OrderDeadline
{
    public static function all(): array
    {
        return [
            '6h' => '6 Hours',
            '12h' => '12 Hours',
            '1d' => '1 Day',
            '2d' => '2 Days',
            '3d' => '3 Days',
            '5d' => '5 Days',
            '7d' => '7 Days',
            '10d' => '10 Days',
            '14d' => '2 Weeks',
            '21d' => '3 Weeks',
            '30d' => '1 Month',
            '60d' => '2 Month',
        ];
    }

    public static function get(string $deadline)
    {
        if (!array_key_exists($deadline, self::all())) {
            return now();
        }
        $x = preg_split("/(^\d)/",$deadline);
        dd($x);
    }
}