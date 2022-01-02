//Given two strings first and second, consider occurrences in some text of the 
//form "first second third", where second comes immediately after first, and third 
//comes immediately after second. 
//
// Return an array of all the words third for each occurrence of "first second 
//third". 
//
// 
// Example 1: 
// Input: text = "alice is a good girl she is a good student", first = "a", 
//second = "good"
//Output: ["girl","student"]
// Example 2: 
// Input: text = "we will we will rock you", first = "we", second = "will"
//Output: ["we","rock"]
// 
// 
// Constraints: 
//
// 
// 1 <= text.length <= 1000 
// text consists of lowercase English letters and spaces. 
// All the words in text a separated by a single space. 
// 1 <= first.length, second.length <= 10 
// first and second consist of lowercase English letters. 
// 
// Related Topics 字符串 👍 56 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    void tokenize(std::string const &str, const char delim,
                  std::vector<std::string> &out)
    {
        size_t start;
        size_t end = 0;

        while ((start = str.find_first_not_of(delim, end)) != std::string::npos)
        {
            end = str.find(delim, start);
            out.push_back(str.substr(start, end - start));
        }
    }

    vector<string> findOcurrences(string text, string first, string second) {
        vector<string> ans = {};

        vector<string > words;
        tokenize(text,' ',words);


        int len = words.size();
        if (len<3){
            return ans;
        }
        int left_1 = 0;
        int left_2 = 1;
        for (int i = 2; i < len; ++i) {
            string cur = words[i];
            if  ((words[left_1]+words[left_2]+cur)==(first+second+cur)){
               ans.push_back(cur);
            }
            left_1 ++;
            left_2 ++;
        }
        return ans;
    }
};
//leetcode submit region end(Prohibit modification and deletion)
