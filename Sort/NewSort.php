<?php

namespace App\Sort;

class NewSort
{
    /**
     * @desc ԭ������, �ȶ�, �ռ临�Ӷ�O(1), ʱ�临�Ӷ�O(n*n)
     * @param $arr array
     * @param $n int
     * @return mixed
     */
    function sort1($arr, $n)
    {
        if ($n <= 1) {
            return $arr;
        }
        for ($i=0; $i<$n; $i++) {
            for ($j=$i+1; $j<$n; $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $tmp = $arr[$i];
                    $tmp[$i] = $arr[$j];
                    $arr[$j] = $tmp;
                }
            }
        }
        return $arr;
    }

    /**
     * @desc �������� ԭ������, �ռ临�Ӷ�O(1), ʱ�临�Ӷ�O(n*n), �ȶ���
     * @param $array
     * @param $n
     * @return mixed
     */
    function insertSort($array, $n)
    {
        if ($n < 2) {
            return $array;
        }
        // ��һ��Ԫ����Ϊ������, �ӵڶ���Ԫ�ؿ�ʼ����
        for ($i=1; $i<$n; $i++) {
            $tmp = $array[$i];
            for ($j=$i-1; $j>=0; $j--) {
                if ($array[$j] > $tmp) {
                    $array[$j+1] = $array[$j];
                    $array[$j] = $tmp;
                }else{
                    break;
                }
            }
        }
        return $array;
    }

    /**
     * @desc ѡ������ ���ȶ� ʱ�临�Ӷ�O(n*n) �ռ临�Ӷ�O(1) ԭ������
     * @param $array
     * @param $n
     * @return mixed
     */
    function chooseSort($array, $n)
    {
        if ($n < 2) {
            return $array;
        }

        for ($i=0; $i<$n-1; $i++) {
            $key = $i;
            for ($j=$i+1; $j<$n; $j++) {
                if ($array[$j] < $array[$i]) {
                    $key = $j;
                }
            }

            if ($key != $i) {
                $tmp = $array[$i];
                $array[$i] = $array[$key];
                $array[$key] = $tmp;
            }
        }
        return $array;
    }


    /** *********************************************************************************** */
                /** ������������ʱ�临�ӶȾ�ΪO(n*n), �ʺϹ�ģ��С����������*/
    /** *********************************************************************************** */






    /** *********************************************************************************** */
           /** ����������������, ʱ�临�Ӷ�ΪO(n log n), �Ƚ��ʺ��Դ��ģ��������, ��Ϊ����*/
    /** *********************************************************************************** */

    /**
     * @desc ��������
     * @param $array
     * @return array
     */
    function quickSort($array)
    {
        if (count($array) < 2) {
            return $array;
        }

        // ���鳤��
        $length = count($array);

        $l_arr = $r_arr = [];
        $key = $array[0];
        for ($i=1; $i<$length-1; $i++) {
            if ($array[$i] > $key) {
                $r_arr[] = $array[$i];
            }else{
                $l_arr[] = $array[$i];
            }
        }

        $l = $this->quickSort($l_arr);
        $r = $this->quickSort($r_arr);
        return array_merge($l, [$key], $r);
    }


}