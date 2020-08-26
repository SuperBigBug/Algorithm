<?php

class Test
{
    // 选择排序
    function choose()
    {
        $num = [12,2,13,43,233,90];

        $len = count($num);
        for ($i=0;$i<$len-1;$i++){
            $k = $i;
            for ($m=$i+1;$m<$len;$m++){
                if ($num[$m] < $num[$i]) {
                    $k = $m;
                }
            }
            if ($k != $i) {
                $tmp = $num[$k];
                $num[$k] = $num[$i];
                $num[$i] = $tmp;
            }
        }
        return $num;
    }

    // 插入排序
    function insert()
    {
        $num = [12,2,13,43,233,90];

        $len = count($num);
        for ($i=1;$i<$len;$i++){
            $tmp = $num[$i];
            for ($j=$i-1;$j>=0;$j--) {
                if ($num[$j] > $tmp) {
                    $num[$j+1] = $num[$j];
                    $num[$j] = $tmp;
                }else{
                    break;
                }
            }
        }
        return $num;
    }

    // 快速排序
    function quick($arr)
    {
        $num = [12,2,13,43,233,90];
        $len = count($num);
        if ($len < 2) {
            return $num;
        }

        $l_arr = [];
        $r_arr = [];
        $key = $num[0];
        for ($i=1;$i<$len;$i++){
            if ($num[$i] > $key) {
                $r_arr[] = $num[$i];
            }else{
                $l_arr[] = $num[$i];
            }
        }

        $l = $this->quick($l_arr);
        $r = $this->quick($r_arr);
        return array_merge($l, [$key], $r);
    }
}

$res = (new Test())->choose();
var_dump($res);