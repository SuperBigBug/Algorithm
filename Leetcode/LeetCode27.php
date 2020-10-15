<?php

//����һ������ nums ��һ��ֵ val������Ҫ ԭ�� �Ƴ�������ֵ���� val ��Ԫ�أ��������Ƴ���������³��ȡ�
//
// ��Ҫʹ�ö��������ռ䣬������ʹ�� O(1) ����ռ䲢 ԭ�� �޸��������顣
//
// Ԫ�ص�˳����Ըı䡣�㲻��Ҫ���������г����³��Ⱥ����Ԫ�ء�
//
//
//
// ʾ�� 1:
//
// ���� nums = [3,2,2,3], val = 3,
//
//����Ӧ�÷����µĳ��� 2, ���� nums �е�ǰ����Ԫ�ؾ�Ϊ 2��
//
//�㲻��Ҫ���������г����³��Ⱥ����Ԫ�ء�
//
//
// ʾ�� 2:
//
// ���� nums = [0,1,2,2,3,0,4,2], val = 2,
//
//����Ӧ�÷����µĳ��� 5, ���� nums �е�ǰ���Ԫ��Ϊ 0, 1, 3, 0, 4��
//
//ע�������Ԫ�ؿ�Ϊ����˳��
//
//�㲻��Ҫ���������г����³��Ⱥ����Ԫ�ء�
//
//
//
//
// ˵��:
//
// Ϊʲô������ֵ��������������Ĵ���������?
//
// ��ע�⣬�����������ԡ����á���ʽ���ݵģ�����ζ���ں������޸�����������ڵ������ǿɼ��ġ�
//
// ����������ڲ���������:
//
// // nums ���ԡ����á���ʽ���ݵġ�Ҳ����˵������ʵ�����κο���
//int len = removeElement(nums, val);
//
//// �ں������޸�����������ڵ������ǿɼ��ġ�
//// ������ĺ������صĳ���, �����ӡ�������� �ó��ȷ�Χ�� ������Ԫ�ء�
//for (int i = 0; i < len; i++) {
//? ? print(nums[i]);
//}
//
// Related Topics ���� ˫ָ��
// ? 674 ? 0


//leetcode submit region begin(Prohibit modification and deletion)

class LeetCode27 {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $fast = $slow = 0;
        $length = count($nums);
        if ($length < 1) {
            return false;
        }
        while ($fast < $length) {
            if ($nums[$fast] != $val) {
                $nums[$slow] = $nums[$fast];
                $slow++;
            }
            $fast++;
        }
        return $slow+1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)