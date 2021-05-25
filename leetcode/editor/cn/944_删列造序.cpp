#include<vector>
#include<string>
#include<iostream>
using namespace std;
class Solution {
public:
    int minDeletionSize(vector<string>& strs) {
        int m = strs.size();
        int n = strs[0].size();
        int ans = 0;
        for(int i=0;i<n;i++){
            char pre = strs[0][i];
            for(int j=1;j<m;j++){
                char curr = strs[j][i];
                if(curr < pre){
                    ans +=1;
                    break;
                }
                pre = curr;
            }
        }
        return ans;
    }
};

int main(int argc, char *argv[]){
    vector<string> strs = {"a","b"};
    Solution s;
    int ans = s.minDeletionSize(strs);
    cout<<ans<<endl;
}
