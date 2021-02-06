#include<vector>
#include<iostream>
using namespace std;
class Solution {
public:
    int maxScore(vector<int>& cardPoints, int k) {
        int n = cardPoints.size();
        int l = n-k;
        //转化成长度为l的滑动窗口内求和最小值
        int left = 0;
        int sum = 0;
        int minVal = INT_MAX;
        int total = 0;
        for (int i = 0; i < n; i++)
        {
            total+=cardPoints[i];
            sum+=cardPoints[i];
            if( i-left+1 > l){
                sum-=cardPoints[left];
                left++;
            }
            if(i>=l-1){         
                minVal = min(minVal,sum);
            }
        }
        return total-minVal;
    }
};

int main(int argc, char const *argv[])
{
    vector<int> list;
    list.push_back(1);
    list.push_back(1000);
    list.push_back(1);
    int k = 1;
    Solution s;
    cout<<s.maxScore(list ,k)<<endl;
    return 0;
}
