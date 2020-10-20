<?php

//����һ��ֻ���� '('��')'��'{'��'}'��'['��']' ���ַ������ж��ַ����Ƿ���Ч��
//
// ��Ч�ַ��������㣺
//
//
// �����ű�������ͬ���͵������űպϡ�
// �����ű�������ȷ��˳��պϡ�
//
//
// ע����ַ����ɱ���Ϊ����Ч�ַ�����
//
// ʾ�� 1:
//
// ����: "()"
//���: true
//
//
// ʾ�� 2:
//
// ����: "()[]{}"
//���: true
//
//
// ʾ�� 3:
//
// ����: "(]"
//���: false
//
//
// ʾ�� 4:
//
// ����: "([)]"
//���: false
//
//
// ʾ�� 5:
//
// ����: "{[]}"
//���: true
// Related Topics ջ �ַ���
// ? 1926 ? 0


//leetcode submit region begin(Prohibit modification and deletion)
class LeetCode20
{
    function solve($s)
    {
        $arr  =[
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];
        $length = strlen($s);
        $stack = [];

        for ($i=0; $i<$length; $i++) {
            if (isset($arr[$s[$i]])) {
                // ������, ��ƥ��
                // ����ջ���������Ԫ��
                $tmp = array_pop($stack);
                if ($tmp != $arr[$s[$i]]) {
                    // Ԫ�ز�ƥ��, gg
                    return false;
                }
            }else{
                // ������, ��ջ
                $stack[] = $s[$i];
            }
        }
        // ջ��Ԫ��, δ��ȫƥ��, ����Ͷ�
        return $stack ? false : true;
    }
}