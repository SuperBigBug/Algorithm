<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/9/14
 * Time: 2:42 PM
 */
class DataStructureBase
{
    /**
     * ʱ�临�Ӷ�
     * O(n!) O(2**n) ʱ�临�Ӷ�������������������, �������
     */

    /**
     * O(1)
     */
    public function O1()
    {
        $a = 0;
        $b = 0;
        return $a+$b;
    }

    /**
     * O(log(n))
     */
    public function OLogN()
    {
        $i=1;
        while($i<100) {
            $i = $i*2;
        }
        return false;
    }

    /**
     * ������ʱ�临�Ӷ�
     *
     * ����ʱ�临�Ӷ�
     * ƽ�����ʱ�临�Ӷ�
     * ��̯���ʱ�临�Ӷ�
     */
}