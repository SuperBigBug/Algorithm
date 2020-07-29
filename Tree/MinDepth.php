<?php
/**
 * Created by PhpStorm.
 * User: zhongyu
 * Date: 2020/7/29
 * Time: 7:41 PM
 */


class MinDepth
{

    public function minDepthSolution($root) {
        if ($root == null) {
            return 0;
        }

        if ($root->left == null && $root->right != null) {
            return $this->minDepthSolution($root->right) + 1;
        }

        if ($root->right == null && $root->left != null) {
            return $this->minDepthSolution($root->left) + 1;
        }

        return $this->minDepthSolution($root->left) > $this->minDepthSolution($root->right) ? $this->minDepthSolution($root->right) + 1 : $this->minDepthSolution($root->left) + 1;
    }
}