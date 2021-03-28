//将一个给定字符串 s 根据给定的行数 numRows ，以从上往下、从左到右进行 Z 字形排列。 
//
// 比如输入字符串为 "PAYPALISHIRING" 行数为 3 时，排列如下： 
//
// 
//P   A   H   N
//A P L S I I G
//Y   I   R 
//
// 之后，你的输出需要从左往右逐行读取，产生出一个新的字符串，比如："PAHNAPLSIIGYIR"。 
//
// 请你实现这个将字符串进行指定行数变换的函数： 
//
// 
//string convert(string s, int numRows); 
//
// 
//
// 示例 1： 
//
// 
//输入：s = "PAYPALISHIRING", numRows = 3
//输出："PAHNAPLSIIGYIR"
// 
//示例 2：
//
// 
//输入：s = "PAYPALISHIRING", numRows = 4
//输出："PINALSIGYAHRPI"
//解释：
//P     I    N
//A   L S  I G
//Y A   H R
//P     I
// 
//
// 示例 3： 
//
// 
//输入：s = "A", numRows = 1
//输出："A"
// 
//
// 
//
// 提示： 
//
// 
// 1 <= s.length <= 1000 
// s 由英文字母（小写和大写）、',' 和 '.' 组成 
// 1 <= numRows <= 1000 
// 
// Related Topics 字符串 
// 👍 1077 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    string convert(string s, int numRows) {
        if(numRows==1){return s;}
        int n = s.size();
        vector<string> list(min(numRows,n));

        int countZ = 0;
        int flag = -1;
        for (int i = 0; i < n; ++i) {
            if(countZ==0){
                flag++;
            }else{
                flag--;
            }
            list[flag].push_back(s[i]);
            if(flag==numRows-1){
                countZ  = 1;
            }else if(flag==0){
                countZ  = 0 ;
            }
        }

        string ans;
        for(string row : list){
            ans += row;
        }
        return ans;
    }
};

int main(){
    Solution s;
    cout << s.convert("AB",1) << endl;
    return 0;
}
//leetcode submit region end(Prohibit modification and deletion)
