//给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串 s ，判断字符串是否有效。 
//
// 有效字符串需满足： 
//
// 
// 左括号必须用相同类型的右括号闭合。 
// 左括号必须以正确的顺序闭合。 
// 
//
// 
//
// 示例 1： 
//
// 
//输入：s = "()"
//输出：true
// 
//
// 示例 2： 
//
// 
//输入：s = "()[]{}"
//输出：true
// 
//
// 示例 3： 
//
// 
//输入：s = "(]"
//输出：false
// 
//
// 示例 4： 
//
// 
//输入：s = "([)]"
//输出：false
// 
//
// 示例 5： 
//
// 
//输入：s = "{[]}"
//输出：true 
//
// 
//
// 提示： 
//
// 
// 1 <= s.length <= 104 
// s 仅由括号 '()[]{}' 组成 
// 
// Related Topics 栈 字符串 
// 👍 2256 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include <stack>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    bool isValid(string s) {
        stack<char> cs;
        int n = s.length();
        for (int i = 0; i < n; ++i) {
            if(s.at(i)==']'){
                if(s.back()=='['){
                    s.pop_back();
                }
            }else if(s.at(i)==')'){
                if(s.back()=='('){
                    s.pop_back();
                }
            }else if (s.at(i)=='}'){
                if(s.back()=='{'){
                    s.pop_back();
                }
            }else{
                s.push_back(s.at(i));
            }

        }
        return cs.empty();
    }
};
//leetcode submit region end(Prohibit modification and deletion)

int main(){
    Solution obj;
    cout<<obj.isValid("(]")<<endl;
    return 0;
}
