package src.BinarySearch.Q704;
class Solution {
    public int search(int[] nums, int target) {
        int left  = 0;
        int right = nums.length-1;
        int check=-1;

        while(left<=right){
            int pos = (right+left)/2;
            if(nums[pos]>target){
                right = pos-1;
            }else if(nums[pos]<target){
                left = pos+1;
            }else{
                check = pos;break;
            }
        }
        return check;
    }

}
class Test{
    public static void main(String[] args) {
        Solution obj = new Solution();
        int[] nums = new int[]{9};
        int target = 9;
        System.out.println(obj.search(nums,target));
    }
}
