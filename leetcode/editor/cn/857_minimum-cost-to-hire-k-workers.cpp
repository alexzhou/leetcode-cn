//There are n workers. You are given two integer arrays quality and wage where 
//quality[i] is the quality of the iᵗʰ worker and wage[i] is the minimum wage 
//expectation for the iᵗʰ worker. 
//
// We want to hire exactly k workers to form a paid group. To hire a group of k 
//workers, we must pay them according to the following rules: 
//
// 
// Every worker in the paid group should be paid in the ratio of their quality 
//compared to other workers in the paid group. 
// Every worker in the paid group must be paid at least their minimum wage 
//expectation. 
// 
//
// Given the integer k, return the least amount of money needed to form a paid 
//group satisfying the above conditions. Answers within 10⁻⁵ of the actual answer 
//will be accepted. 
//
// 
// Example 1: 
//
// 
//Input: quality = [10,20,5], wage = [70,50,30], k = 2
//Output: 105.00000
//Explanation: We pay 70 to 0ᵗʰ worker and 35 to 2ⁿᵈ worker.
// 
//
// Example 2: 
//
// 
//Input: quality = [3,1,10,10,1], wage = [4,8,2,2,7], k = 3
//Output: 30.66667
//Explanation: We pay 4 to 0ᵗʰ worker, 13.33333 to 2ⁿᵈ and 3ʳᵈ workers 
//separately.
// 
//
// 
// Constraints: 
//
// 
// n == quality.length == wage.length 
// 1 <= k <= n <= 10⁴ 
// 1 <= quality[i], wage[i] <= 10⁴ 
// 
//
// Related Topics 贪心 数组 排序 堆（优先队列） 👍 255 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    double mincostToHireWorkers(vector<int>& quality, vector<int>& wage, int k) {

    }
};
//leetcode submit region end(Prohibit modification and deletion)
