<?php

namespace App\Traits;

trait Merge
{

    public function myers(string $stra, string $strb)
    {
        $n = strlen($stra);
        $m = strlen($strb);

        $v = ['1' => 0];
        $vs = [
            '0' => ['1' => 0]
        ];

        loop:
            for ($d = 0; $d <= $n + $m; $d++){
                $tmp = [];
                for($k = -$d; $k <= $d; $k += 2){
                    $down = $k === -$d || ($k !== $d && $v[$k + 1] > $v[$k - 1]);
                }
            }
    }

    public function solution($vs, $n, $m, $d)
    {

    }

    public function printRes($snakes, $stra, $strb)
    {

    }


}