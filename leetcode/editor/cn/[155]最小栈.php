<?php
//设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
//
// 
// push(x) —— 将元素 x 推入栈中。 
// pop() —— 删除栈顶的元素。 
// top() —— 获取栈顶元素。 
// getMin() —— 检索栈中的最小元素。 
// 
//
// 
//
// 示例: 
//
// 输入：
//["MinStack","push","push","push","getMin","pop","top","getMin"]
//[[],[-2],[0],[-3],[],[],[],[]]
//
//输出：
//[null,null,null,null,-3,null,0,-2]
//
//解释：
//MinStack minStack = new MinStack();
//minStack.push(-2);
//minStack.push(0);
//minStack.push(-3);
//minStack.getMin();   --> 返回 -3.
//minStack.pop();
//minStack.top();      --> 返回 0.
//minStack.getMin();   --> 返回 -2.
// 
//
// 
//
// 提示： 
//
// 
// pop、top 和 getMin 操作总是在 非空栈 上调用。 
// 
// Related Topics 栈 设计 
// 👍 834 👎 0


//leetcode submit region begin(Prohibit modification and deletion)
class MinStack {
    /**
     * initialize your data structure here.
     */
    private $minArr = [];
    private $arr = [];
    function __construct() {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        $this->arr[] = $x;
        if(empty($this->minArr) || $x < $this->minArr[count($this->minArr)-1]){
            $this->minArr[] = $x;
        }else{
            $this->minArr[] = $this->minArr[count($this->minArr)-1];
        }
    }

    /**
     * @return NULL
     */
    function pop() {
        array_pop($this->arr);
        array_pop($this->minArr);
    }

    /**
     * @return Integer
     */
    function top() {
        return $this->arr[count($this->arr)-1];
    }

    /**
     * @return Integer
     */
    function getMin() {
        return $this->minArr[count($this->minArr)-1];
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
//leetcode submit region end(Prohibit modification and deletion)
$obj = new MinStack();
$obj->push(-2);
$obj->push(0);
$obj->push(-3);
echo $obj;