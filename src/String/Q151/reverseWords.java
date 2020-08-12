package src.String.Q151;
class Solution {
    public String reverseWords(String s) {

        String[] str = s.split(" ");
        int len = str.length;
        StringBuilder result = new StringBuilder();
        for(int i =len-1;i>=0;i--){
            String word = str[i].trim();
            result.append(word.isEmpty() ? "" : word + " ");
        }
        return result.toString().trim();
    }
}

class Test{
    public static void main(String[] args) {
        String str = "a good   example";
        Solution obj = new Solution();
        System.out.println(obj.reverseWords(str));
    }
}