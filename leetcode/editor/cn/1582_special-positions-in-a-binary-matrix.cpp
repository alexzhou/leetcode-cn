//Given an m x n binary matrix mat, return the number of special positions in 
//mat. 
//
// A position (i, j) is called special if mat[i][j] == 1 and all other elements 
//in row i and column j are 0 (rows and columns are 0-indexed). 
//
// 
// Example 1: 
// 
// 
//Input: mat = [[1,0,0],[0,0,1],[1,0,0]]
//Output: 1
//Explanation: (1, 2) is a special position because mat[1][2] == 1 and all 
//other elements in row 1 and column 2 are 0.
// 
//
// Example 2: 
// 
// 
//Input: mat = [[1,0,0],[0,1,0],[0,0,1]]
//Output: 3
//Explanation: (0, 0), (1, 1) and (2, 2) are special positions.
// 
//
// 
// Constraints: 
//
// 
// m == mat.length 
// n == mat[i].length 
// 1 <= m, n <= 100 
// mat[i][j] is either 0 or 1. 
// 
//
// Related Topics 数组 矩阵 👍 66 👎 0


#include <cstdio>
#include <vector>
#include <algorithm>
#include <iostream>
#include <numeric>
using namespace std;

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
public:
    int numSpecial(vector<vector<int>>& mat) {
        int rows = mat.size();
        int columns = mat[0].size();

        vector<int> row_0(rows);
        vector<int> column_0(columns);

        for (int i=0;i<columns;i++) {
            for (int j = 0; j < rows; ++j) {
                column_0[i]+=mat[j][i];
                row_0[j]+=mat[j][i];
            }
        }

        int res = 0;
        for (int i=0;i<rows;i++) {
            for (int j = 0; j < columns; ++j) {
                if (mat[i][j]==1 && row_0[i]==1 && column_0[j]==1){
                    res+=1;
                }
            }
        }
        return res;
    }

    void print(vector<int> v){
        for (auto i: v)
            std::cout << i << ' ';
    }
};
//leetcode submit region end(Prohibit modification and deletion)
