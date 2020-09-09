package src.String.Q165;
class Solution {
    public int compareVersion(String version1, String version2) {

        String[] arr1 = version1.split("\\.");
        String[] arr2 = version2.split("\\.");
        int maxLength = Math.max(arr1.length,arr2.length);
        int flag = 1;
        for (int i=0;i<maxLength;i++){
            int v1=i<arr1.length?Integer.parseInt(arr1[i]):0;
            int v2=i<arr2.length?Integer.parseInt(arr2[i]):0;

            if(v1==v2){
                flag=0;
            }else{
                flag=v2>v1?-1:1;
                break;
            }
        }
        return flag;
    }
}

class Test {
    public static void main(String[] args) {
        Solution obj = new Solution();
        String v1 = "1.01";
        String v2 = "1.001";
        System.out.println(obj.compareVersion(v1,v2));
    }
}

