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
        int r_count = 0;
        int c_count = 0;
        vector<vector<int>> ans;
        for(int i=0;i<x;i++){
            for(int j=0;j<y;j++){
                c_count++;
                temp.push_back(nums[i][j]);
                if(c_count==c){
                    ans.push_back(temp);
                    r_count++;
                    c_count = 0;
                    temp.clear();
                    if(r_count==r){
                        return ans;
                    }
                }
            }
        }
        return ans;
    }
};