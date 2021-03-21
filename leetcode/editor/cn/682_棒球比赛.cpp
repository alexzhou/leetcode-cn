//你现在是一场采用特殊赛制棒球比赛的记录员。这场比赛由若干回合组成，过去几回合的得分可能会影响以后几回合的得分。 
//
// 比赛开始时，记录是空白的。你会得到一个记录操作的字符串列表 ops，其中 ops[i] 是你需要记录的第 i 项操作，ops 遵循下述规则： 
//
// 
// 整数 x - 表示本回合新获得分数 x 
// "+" - 表示本回合新获得的得分是前两次得分的总和。题目数据保证记录此操作时前面总是存在两个有效的分数。 
// "D" - 表示本回合新获得的得分是前一次得分的两倍。题目数据保证记录此操作时前面总是存在一个有效的分数。 
// "C" - 表示前一次得分无效，将其从记录中移除。题目数据保证记录此操作时前面总是存在一个有效的分数。 
// 
//
// 请你返回记录中所有得分的总和。 
//
// 
//
// 示例 1： 
//
// 
//输入：ops = ["5","2","C","D","+"]
//输出：30
//解释：
//"5" - 记录加 5 ，记录现在是 [5]
//"2" - 记录加 2 ，记录现在是 [5, 2]
//"C" - 使前一次得分的记录无效并将其移除，记录现在是 [5].
//"D" - 记录加 2 * 5 = 10 ，记录现在是 [5, 10].
//"+" - 记录加 5 + 10 = 15 ，记录现在是 [5, 10, 15].
//所有得分的总和 5 + 10 + 15 = 30
// 
//
// 示例 2： 
//
// 
//输入：ops = ["5","-2","4","C","D","9","+","+"]
//输出：27
//解释：
//"5" - 记录加 5 ，记录现在是 [5]
//"-2" - 记录加 -2 ，记录现在是 [5, -2]
//"4" - 记录加 4 ，记录现在是 [5, -2, 4]
//"C" - 使前一次得分的记录无效并将其移除，记录现在是 [5, -2]
//"D" - 记录加 2 * -2 = -4 ，记录现在是 [5, -2, -4]
//"9" - 记录加 9 ，记录现在是 [5, -2, -4, 9]
//"+" - 记录加 -4 + 9 = 5 ，记录现在是 [5, -2, -4, 9, 5]
//"+" - 记录加 9 + 5 = 14 ，记录现在是 [5, -2, -4, 9, 5, 14]
//所有得分的总和 5 + -2 + -4 + 9 + 5 + 14 = 27
// 
//
// 示例 3： 
//
// 
//输入：ops = ["1"]
//输出：1
// 
//
// 
//
// 提示： 
//
// 
// 1 <= ops.length <= 1000 
// ops[i] 为 "C"、"D"、"+"，或者一个表示整数的字符串。整数范围是 [-3 * 104, 3 * 104] 
// 对于 "+" 操作，题目数据保证记录此操作时前面总是存在两个有效的分数 
// 对于 "C" 和 "D" 操作，题目数据保证记录此操作时前面总是存在一个有效的分数 
// 
// Related Topics 栈 
// 👍 168 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include <stack>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    int calPoints(vector<string>& ops) {
        stack<string> ss;
        for (const string& op : ops){
            if(op=="+"){
                int x = stoi(ss.top());
                ss.pop();
                int y = stoi(ss.top());
                ss.pop();
                ss.push(to_string(y));
                ss.push(to_string(x));
                ss.push(to_string(x+y));
            }else if(op=="D"){
                ss.push(to_string(stoi(ss.top())*2));
            }else if(op=="C"){
                ss.pop();
            }else{
                ss.push(op);
            }
        }
        int ans = 0;
        while (!ss.empty()){
            ans += stoi(ss.top());
            ss.pop();
        }
        return ans;
    }
    /**
     * faster method
     * @param ops
     * @return
     */
    int calPoints2(vector<string>& ops) {
        vector<string> ss;
        for (const string& op : ops){
            if(op=="+"){
                int x = stoi(ss[ss.size()-1]);
                int y = stoi(ss[ss.size()-2]);
                ss.push_back(to_string(x+y));
            }else if(op=="D"){
                ss.push_back(to_string(stoi(ss[ss.size()-1])*2));
            }else if(op=="C"){
                ss.pop_back();
            }else{
                ss.push_back(op);
            }
        }
        int ans = 0;
        for(const auto& item : ss){
            ans += stoi(item);
        }
        return ans;
    }
};

int main(){
    vector<string> ops ={"5","-2","4","C","D","9","+","+"};
    Solution obj;
    cout<<obj.calPoints2(ops)<<endl;
}
//leetcode submit region end(Prohibit modification and deletion)
