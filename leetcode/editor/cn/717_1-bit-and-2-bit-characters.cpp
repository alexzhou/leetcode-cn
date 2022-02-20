//We have two special characters: 
//
// 
// The first character can be represented by one bit 0. 
// The second character can be represented by two bits (10 or 11). 
// 
//
// Given a binary array bits that ends with 0, return true if the last 
//character must be a one-bit character. 
//
// 
// Example 1: 
//
// 
//Input: bits = [1,0,0]
//Output: true
//Explanation: The only way to decode it is two-bit character and one-bit 
//character.
//So the last character is one-bit character.
// 
//
// Example 2: 
//
// 
//Input: bits = [1,1,1,0]
//Output: false
//Explanation: The only way to decode it is two-bit character and two-bit 
//character.
//So the last character is not one-bit character.
// 
//
// 
// Constraints: 
//
// 
// 1 <= bits.length <= 1000 
// bits[i] is either 0 or 1. 
// 
// Related Topics 数组 👍 253 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    bool isOneBitCharacter(vector<int>& bits) {
        int len = bits.size();
        if(len==1)return true;
        if (len==2){
            if(bits[0]==0 && bits[1]==0){
                return true;
            }else{
                return false;
            }
        }

        int i=0;
        int first;
        bool isTwo = false;
        while(i<len){
            first = bits[i];
            if(first==1){
                i+=2;
                isTwo = true;
            }else if(first==0){
                i+=1;
                isTwo = false;
            }
        }

        return !isTwo;
    }
};
//leetcode submit region end(Prohibit modification and deletion)
