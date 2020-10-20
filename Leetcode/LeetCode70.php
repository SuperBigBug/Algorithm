<?php

namespace App\Leetcode;

//������������¥�ݡ���Ҫ n ������ܵ���¥����
//
// ÿ��������� 1 �� 2 ��̨�ס����ж����ֲ�ͬ�ķ�����������¥���أ�
//
// ע�⣺���� n ��һ����������
//
// ʾ�� 1��
//
// ���룺 2
//����� 2
//���ͣ� �����ַ�����������¥����
//1.  1 �� + 1 ��
//2.  2 ��
//
// ʾ�� 2��
//
// ���룺 3
//����� 3
//���ͣ� �����ַ�����������¥����
//1.  1 �� + 1 �� + 1 ��
//2.  1 �� + 2 ��
//3.  2 �� + 1 ��
//
// Related Topics ��̬�滮
// ? 1289 ? 0


//leetcode submit region begin(Prohibit modification and deletion)

class LeetCode70
{
    function solve($n, &$arr)
    {

        if ($n == 1 || $n == 2) {
            return $n;
        }
        if (isset($arr[$n])) {
            return $arr[$n];
        }

        $res = $this->solve($n-1, $arr) + $this->solve($n-2, $arr);
        $arr[$n] = $res;
        return $res;
    }

    function solveAnother($n)
    {
        if ($n == 0 || $n == 1) {
            return $n;
        }

        $first = 1;
        $second = 2;
        for ($i=3; $i<=$n; $i++) {
            $third = $first + $second;
            $first = $second;
            $second = $third;
        }
        return $second;
    }
}