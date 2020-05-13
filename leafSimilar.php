<?php


/**
 * 872. 叶子相似的树
 * Class LeafSimilarSolution
 * https://leetcode-cn.com/problems/leaf-similar-trees/
 */
class LeafSimilarSolution
{

    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Boolean
     */
    function leafSimilar($root1, $root2)
    {
        $list1 = $root1 ? $this->helper($root1, $root1, []) : [];
        $list2 = $root2 ? $this->helper($root2, $root2, []) : [];
        if (count($list1) != count($list2)) {
            return false;
        }
        foreach ($list1 as $i => $item) {
            if ($item != $list2[$i]) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $cur_node
     * @param array $already_list
     * @return array
     */
    function helper($root, $cur_node, $already_list)
    {
        if (!isset($cur_node->left) && !isset($cur_node->right)) {
            $already_list[] = $cur_node->val;
        }
        isset($cur_node->left) && $already_list = $this->helper($root, $cur_node->left, $already_list);
        isset($cur_node->right) && $already_list = $this->helper($root, $cur_node->right, $already_list);
        return $already_list;
    }

}
