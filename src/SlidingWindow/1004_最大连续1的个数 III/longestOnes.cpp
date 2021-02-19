#include<vector>
#include<iostream>
using namespace std;
class Solution {
public:
    int longestOnes(vector<int>& A, int K) {
        int n = A.size();
        int left = 0;
        int zeroCount = 0;
        int ans=0;
        for (int i = 0; i < n; i++)
        {
            if(A[i]==0){
                zeroCount++;
            }
            if(zeroCount>K){
                ans = max(ans,i-1-left+1);
                if(A[left]==0){
                    zeroCount--;
                }
                left++;
            }else{
                ans = max(ans,i-left+1);
            }
            
        }
        return ans;
    }
};