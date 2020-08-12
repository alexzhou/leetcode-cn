package src.Math.Q168;

import java.util.HashMap;
import java.util.Map;

class Solution {
    public String convertToTitle(int n) {
        StringBuilder sb = new StringBuilder();
        while (n > 0) {
            int c = n % 26;
            if(c == 0){
                c = 26;
                n -= 1;
            }
            sb.insert(0, (char) ('A' + c - 1));
            n /= 26;
        }
        return sb.toString();
    }
}

class Test{
    public static void main(String[] args) {
        Solution obj = new Solution();
        String result = obj.convertToTitle(28);
        System.out.println(result);
    }
}