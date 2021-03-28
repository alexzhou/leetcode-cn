//给你一个整数数组 nums ，数组中共有 n 个整数。132 模式的子序列 由三个整数 nums[i]、nums[j] 和 nums[k] 组成，并同时满足
//：i < j < k 和 nums[i] < nums[k] < nums[j] 。 
//
// 如果 nums 中存在 132 模式的子序列 ，返回 true ；否则，返回 false 。 
//
// 
//
// 进阶：很容易想到时间复杂度为 O(n^2) 的解决方案，你可以设计一个时间复杂度为 O(n logn) 或 O(n) 的解决方案吗？ 
//
// 
//
// 示例 1： 
//
// 
//输入：nums = [1,2,3,4]
//输出：false
//解释：序列中不存在 132 模式的子序列。
// 
//
// 示例 2： 
//
// 
//输入：nums = [3,1,4,2]
//输出：true
//解释：序列中有 1 个 132 模式的子序列： [1, 4, 2] 。
// 
//
// 示例 3： 
//
// 
//输入：nums = [-1,3,2,0]
//输出：true
//解释：序列中有 3 个 132 模式的的子序列：[-1, 3, 2]、[-1, 3, 0] 和 [-1, 2, 0] 。
// 
//
// 
//
// 提示： 
//
// 
// n == nums.length 
// 1 <= n <= 104 
// -109 <= nums[i] <= 109 
// 
// Related Topics 栈 
// 👍 488 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include <stack>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    bool find132pattern(vector<int>& nums) {
        int n = nums.size();
        int leftMin[n];
        leftMin[0] = nums[0];
        for (int i = 1; i < n; ++i) {
            leftMin[i] = min(leftMin[i-1],nums[i-1]);
        }
        stack<int> ss;
        ss.push(nums[n-1]);
        for (int j = n-2; j >=0 ; --j) {
            int val = INT32_MIN;
            while (!ss.empty() && ss.top() < nums[j]){
               val = ss.top();
               ss.pop();
            }
            if (leftMin[j] < val){
                return true;
            }
            ss.push(nums[j]);
        }
        return false;
    }
};
int main(){
   Solution s;
   vector<int> nums{-1,3,2,0};
   cout<< s.find132pattern(nums)<<endl;
   return 0;
}
//leetcode submit region end(Prohibit modification and deletion)
