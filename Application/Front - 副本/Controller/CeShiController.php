<?php
namespace Front\Controller;

use BarClass as Bar;
use Think\Controller;

class CeShiController extends Controller
{
    public function aa($a, $b)
    {
        if ($a === $b) {
            bb();
        } elseif ($a > $b){
            $ceshi->bb($qq);
        } else {
            Bar::bar($a, $b);
        }
    }

    final public static function bb()
    {
        for($i = 0; $i < 10; $i++){

        }
    }
}
