<?php

class MaxDepth
{
    public function method($root){
        if ($root == null) {
            return 0;
        }

        $d = 1;
        if ($root->left == null &&  $root->right == null) {
            return $d;
        }
        $l_d = $this->method($root->left);
        $r_d = $this->method($root->right);

        return $l_d >= $r_d ? $l_d + $d: $r_d + $d;
    }
}