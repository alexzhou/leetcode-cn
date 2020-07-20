<?php
include_once "./../../common/TreeNode.php";
class Solution {

    /**
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        if(empty($inorder) || empty($postorder))return null;
        $node = new TreeNode(array_pop($postorder));

        $pos = array_search($node->val,$inorder);
        $leftInorder = array_slice($inorder,0,$pos);
        $rightInorder = array_slice($inorder,$pos+1);
        $leftPostOrder = array_slice($postorder,0,$pos);
        $rightPostOrder = array_slice($postorder,$pos);

        if($leftInorder){
            $node->left = $this->buildTree($leftInorder,$leftPostOrder);
        }
        if($rightInorder){
            $node->right = $this->buildTree($rightInorder,$rightPostOrder);
        }
        return $node;
    }
}
$inorder = [9,3,15,20,7];
$postorder = [9,15,7,20,3];
$obj = new Solution();
$root = $obj->buildTree($inorder,$postorder);
var_dump($root);