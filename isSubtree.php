<?php

/**
 * 572. 另一个树的子树
 * Class IsSubtreeSolution
 * https://leetcode-cn.com/problems/subtree-of-another-tree/
 */
class IsSubtreeSolution
{

    /**
     * @param TreeNode $s
     * @param TreeNode $t
     * @return Boolean
     */
    function isSubtree($s, $t)
    {
        if($s == null || $t == null){
            return $s == null && $t == null;
        }
        return $s->val == $t->val && $this->verify($s,$t)
            ? true : ($this->isSubtree($s->left,$t) || $this->isSubtree($s->right,$t));
    }

    /**
     * @param TreeNode $s
     * @param TreeNode $t
     * @return Boolean
     */
    function verify($s,$t)
    {
        if($s == null || $t == null){
            return $s == null && $t == null;
        }else{
            return $s->val == $t->val
                && $this->verify($s->right,$t->right)
                && $this->verify($s->left,$t->left);
        }
    }
}