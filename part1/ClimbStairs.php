<?php

/**
 *
    70. ��¥��
        ������������¥�ݡ���Ҫ n ������ܵ���¥����
        ÿ��������� 1 �� 2 ��̨�ס����ж����ֲ�ͬ�ķ�����������¥���أ�
        ע�⣺���� n ��һ����������

        ʾ�� 1��
        ���룺 2
        ����� 2
        ���ͣ� �����ַ�����������¥����
        1.  1 �� + 1 ��
        2.  2 ��
 *
 */

class Solution {

    /**
     * ��̬�滮
     *
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if($n < 1) {
            return 0;
        }

        $arr = [];
        $arr[1] = 1;
        $arr[2] = 2;
        for($i=3; $i<= $n; $i++){
            $arr[$i] = $arr[$i-1] + $arr[$i-2];
        }
        return $arr[$n];
    }

    /**
     * ������, ���ڴ����ظ�����
     *
     * @param $n
     * @param $i
     * @return int
     */
    function climbStairs1($i, $n) {
        if ($i>$n) {
            return 0;
        }
        if ($i == $n) {
            return 1;
        }

        return $this->climbStairs1($i + 1, $n) + $this->climbStairs1($i + 2, $n);
    }

    /**
     * �����������Ż�
     *
     * @param $i
     * @param $n
     * @param $arr
     * @return int
     */
    function climbStairs2($i, $n, &$arr) {
        if ($i > $n) {
            return 0;
        }
        if ($i == $n) {
            return 1;
        }

        if (isset($arr[$i])) {
            return $arr[$i];
        }

        $arr[$i] = $this->climbStairs2($i+1, $n, $arr) + $this->climbStairs2($i+2, $n, $arr);

        return $arr[$i];
    }


    /**
     * 쳲���������
     *
     * @param $n
     * @return int
     */
    function climbStairsFib($n) {
        if ($n == 0) {
            return 0;
        }

        $first = 1;
        $second = 2;

        for ($i=3; $i<=$n; $i++) {
            $third = $second + $first;
            $first = $second;
            $second = $third;
        }
        return $second;
    }
}