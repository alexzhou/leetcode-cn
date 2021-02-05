#include <string>
#include <stdlib.h>
#include <iostream>
using namespace std;
class Solution {
public:
    int equalSubstring(string s, string t, int maxCost) {

        int len = s.length();
        int list[len];
        for(int i=0;i<len;i++)
        {
           list[i] =  abs(s.at(i) - t.at(i));
        }
        int left = 0;
        int sum = 0;
        int ans = 0;
        for (int i = 0; i < len; i++)
        {
            sum += list[i];
            while (left<=i && sum > maxCost)
            {
                sum -= list[left];
                left++;
            }
            ans = max(ans,i-left+1);
        }
        return ans;
        
    }
};
int main(int argc, char const *argv[])
{
    Solution s;
    int ans = s.equalSubstring("abcd","acde",0);
    cout<<ans<<endl;
    return 0;
}
