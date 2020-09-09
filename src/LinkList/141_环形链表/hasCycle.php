<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head)
    {
        $slow = $head;
        $fast = $head;
        while ($slow && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if (!$fast) {
                return false;
            }
            if ($slow == $fast) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle2($head)
    {
        $set = [];
        while ($head) {
            $id = spl_object_id($head);
            if (in_array($id, $set)) {
                return true;
            } else {
                $set[] = $id;
            }
            $head = $head->next;
        }
        return false;
    }
}