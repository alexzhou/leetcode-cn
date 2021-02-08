#include<iostream>
#include<vector>
#include <algorithm> 
using namespace std;
class Solution {
public:
    int maxTurbulenceSize(vector<int>& arr) {
        int n = arr.size();
        int left = 0;
        int ans = 0;
        vector<int> list;
        for(int i=0;i<n-1;i++){
            int flag = compare(arr[i],arr[i+1]);
            list.push_back(flag);
        }
        for(int j=1;j<list.size();j++){
            if( list[j-1]+list[j] !=0){
                ans = max(ans,(j-1)-left+1);
                left=j;
            }
        }
        return ans+1;
    }

    int compare(int a,int b){
        if(a>b){
            return 1;
        }else if(a<b){
            return -1;
        }else{
            return 0;
        }
    }
};

