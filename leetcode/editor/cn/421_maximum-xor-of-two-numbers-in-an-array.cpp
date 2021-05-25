//Given an integer array nums, return the maximum result of nums[i] XOR nums[j],
// where 0 <= i ≤ j < n. 
//
// Follow up: Could you do this in O(n) runtime? 
//
// 
// Example 1: 
//
// 
//Input: nums = [3,10,5,25,2,8]
//Output: 28
//Explanation: The maximum result is 5 XOR 25 = 28. 
//
// Example 2: 
//
// 
//Input: nums = [0]
//Output: 0
// 
//
// Example 3: 
//
// 
//Input: nums = [2,4]
//Output: 6
// 
//
// Example 4: 
//
// 
//Input: nums = [8,10,2]
//Output: 10
// 
//
// Example 5: 
//
// 
//Input: nums = [14,70,53,83,49,91,36,80,92,51,66,70]
//Output: 127
// 
//
// 
// Constraints: 
//
// 
// 1 <= nums.length <= 2 * 104 
// 0 <= nums[i] <= 231 - 1 
// 
// Related Topics 位运算 字典树 
// 👍 359 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
struct Trie {
    // 左子树指向表示 0 的子节点
    Trie* left = nullptr;
    // 右子树指向表示 1 的子节点
    Trie* right = nullptr;

    Trie() = default;
};
class Solution {
protected:
    Trie* root = new Trie();
    static constexpr int HIGH_BIT = 30;
public:
    void add(int num){
        Trie* cur = root;
        for (int k = HIGH_BIT; k >= 0; --k) {
            int bit = (num >> k) & 1;
            if(bit==0){
                if(!cur->left){
                    cur->left = new Trie();
                }
                cur = cur->left;
            }else{
                if(!cur->right){
                    cur->right = new Trie();
                }
                cur = cur->right;
            }
        }
    }

    int find(int num){
        Trie* cur = root;
        int x = 0;
        for (int k = HIGH_BIT; k >= 0; --k) {
            int bit = (num >> k) & 1;//高位到低位
            if (bit == 0) {
                //优先往right走
                if (cur->right) {
                    cur = cur->right;
                    x = x * 2 + 1;
                }
                else {
                    cur = cur->left;
                    x = x * 2;
                }
            }
            else {
                //优先往left走
                if (cur->left) {
                    cur = cur->left;
                    x = x * 2 + 1;
                }
                else {
                    cur = cur->right;
                    x = x * 2;
                }
            }
        }
        return x;
    }
    int findMaximumXOR(vector<int>& nums) {
        int n= nums.size();
        int x = 0;
        for(int i=1;i<n;i++){
            add(nums[i-1]);
            x = max(x, find(nums[i]));
        }
        return x;
    }
};
//leetcode submit region end(Prohibit modification and deletion)
