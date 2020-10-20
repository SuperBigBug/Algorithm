<?php

//给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。
//
// 有效字符串需满足：
//
//
// 左括号必须用相同类型的右括号闭合。
// 左括号必须以正确的顺序闭合。
//
//
// 注意空字符串可被认为是有效字符串。
//
// 示例 1:
//
// 输入: "()"
//输出: true
//
//
// 示例 2:
//
// 输入: "()[]{}"
//输出: true
//
//
// 示例 3:
//
// 输入: "(]"
//输出: false
//
//
// 示例 4:
//
// 输入: "([)]"
//输出: false
//
//
// 示例 5:
//
// 输入: "{[]}"
//输出: true
// Related Topics 栈 字符串
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
                // 反括号, 做匹配
                // 弹出栈中最上面的元素
                $tmp = array_pop($stack);
                if ($tmp != $arr[$s[$i]]) {
                    // 元素不匹配, gg
                    return false;
                }
            }else{
                // 正括号, 入栈
                $stack[] = $s[$i];
            }
        }
        // 栈有元素, 未完全匹配, 否则就对
        return $stack ? false : true;
    }
}