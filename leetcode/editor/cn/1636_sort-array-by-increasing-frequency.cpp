//给你一个整数数组 nums ，请你将数组按照每个值的频率 升序 排序。如果有多个值的频率相同，请你按照数值本身将它们 降序 排序。 
//
// 请你返回排序后的数组。 
//
// 
//
// 示例 1： 
//
// 输入：nums = [1,1,2,2,2,3]
//输出：[3,1,1,2,2,2]
//解释：'3' 频率为 1，'1' 频率为 2，'2' 频率为 3 。
// 
//
// 示例 2： 
//
// 输入：nums = [2,3,1,3,2]
//输出：[1,3,3,2,2]
//解释：'2' 和 '3' 频率都为 2 ，所以它们之间按照数值本身降序排序。
// 
//
// 示例 3： 
//
// 输入：nums = [-1,1,-6,4,5,-6,1,4,1]
//输出：[5,-1,4,4,-6,-6,1,1,1] 
//
// 
//
// 提示： 
//
// 
// 1 <= nums.length <= 100 
// -100 <= nums[i] <= 100 
// 
//
// Related Topics 数组 哈希表 排序 👍 120 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include "map"
#include "set"
#include "unordered_map"
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    vector<int> frequencySort(vector<int>& nums) {
        //count nums
        map<int,int> count;
        for(int i : nums){
            if(count.find(i) != count.end()){
                count[i]+=1;
            }else{
                count[i] = 1;
            }
        }
        //use array index for sort
        //collect subset
        map<int, int>::iterator itr;
        set<int,greater<int>> ans[101];
        for(itr=count.begin();itr!=count.end();++itr){
            ans[itr->second].insert(itr->first);
        }

        //output
        vector<int> ret;
        for (int i=1;i<=100;++i) {
            if (ans[i].size() > 0){//count > 0
                for(int j : ans[i]){
                    for(int z=0;z<i;++z){//repeat
                        ret.push_back(j);
                    }
                }
            }
        }
        return ret;
    }

    vector<int> frequencySort2(vector<int>& nums) { unordered_map<int, int> cnt; for (int num : nums) { cnt[num]++; } sort(nums.begin(), nums.end(), [&](const int a, const int b) { if (cnt[a] != cnt[b]) { return cnt[a] < cnt[b]; } return a > b; }); return nums; }
};
//leetcode submit region end(Prohibit modification and deletion)
