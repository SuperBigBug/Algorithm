<?php

class MinDepth
{
    public function method($root)
    {
        if ($root == null) {
            return 0;
        }

        if ($root->left == null && $root->right != null) {
            return $this->method($root->right)+1;
        }
        if ($root->left != null && $root->right == null) {
            return $this->method($root->left) + 1;
        }
        return $this->method($root->left) >= $this->method($root->right) ? $this->method($root->right) +1 : $this->method($root->left) + 1;
    }
}