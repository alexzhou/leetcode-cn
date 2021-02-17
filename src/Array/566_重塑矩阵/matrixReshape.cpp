#include<iostream>
#include<vector>
using namespace std;
class Solution {
public:
    vector<vector<int>> matrixReshape(vector<vector<int>>& nums, int r, int c) {
        int x = nums.size();
        int y = nums[0].size();
        if (x*y < r*c){
            return nums;
        }
        vector<int> temp;
        int count = 0;
        vector<vector<int>> ans;
        for(int i=0;i<x;i++){
            for(int j=0;j<y;j++){
                count++;
                temp.push_back(nums[i][j]);
                if(count%c==0){
                    ans.push_back(temp);
                    temp.clear();
                    if(count==r*c){
                        return ans;
                    }
                }
            }
        }
        return ans;
    }
};