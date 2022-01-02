//Given a string s containing an out-of-order English representation of digits 0
//-9, return the digits in ascending order. 
//
// 
// Example 1: 
// Input: s = "owoztneoer"
//Output: "012"
// Example 2: 
// Input: s = "fviefuro"
//Output: "45"
// 
// 
// Constraints: 
//
// 
// 1 <= s.length <= 105 
// s[i] is one of the characters ["e","g","f","i","h","o","n","s","r","u","t","w
//","v","x","z"]. 
// s is guaranteed to be valid. 
// 
// Related Topics 哈希表 数学 字符串 
// 👍 166 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include <unordered_map>
#include <map>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
void print_map(const map<char,int>& m){
    for (std::pair<char, int> element : m) {
        // Accessing KEY from element
        char word = element.first;
        // Accessing VALUE from element.
        int count = element.second;
        std::cout << word << " :: " << count << std::endl;
    }
}
class Solution {
public:
    string originalDigits(string s) {
        unordered_map<char, int> c;
        for (char ch: s) {
            ++c[ch];
        }

        vector<int> cnt(10);
        cnt[0] = c['z'];
        cnt[2] = c['w'];
        cnt[4] = c['u'];
        cnt[6] = c['x'];
        cnt[8] = c['g'];

        cnt[3] = c['h'] - cnt[8];
        cnt[5] = c['f'] - cnt[4];
        cnt[7] = c['s'] - cnt[6];

        cnt[1] = c['o'] - cnt[0] - cnt[2] - cnt[4];

        cnt[9] = c['i'] - cnt[5] - cnt[6] - cnt[8];

        string ans;
        for (int i = 0; i < 10; ++i) {
            for (int j = 0; j < cnt[i]; ++j) {
                ans += char(i + '0');
            }
        }
        return ans;
    }

};

//int main(int argc, char *argv[]){
//    Solution obj ;
//    string ans = obj.originalDigits("owoztneoer");
//    cout<<ans<<endl;
//    return 0;
//}
//leetcode submit region end(Prohibit modification and deletion)
