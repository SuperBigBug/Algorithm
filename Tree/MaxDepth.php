<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/28
 * Time: 11:44 AM
 */


class MaxDepth
{
    function treeMaxDepth($root)
    {
        if ($root == null){
            return 0;
        }

        $depth = 1;
        // ֻ��һ�����ڵ�
        if ($root->left == null && $root->right == null) {
            return $depth;
        }

        $left_max_depth = $this->treeMaxDepth($root->left);
        $right_max_depth = $this->treeMaxDepth($root->right);

        // ��ȡ������
        $max_depth = $left_max_depth >= $right_max_depth ? $left_max_depth + $depth : $right_max_depth + $depth;

        return $max_depth;
    }
}