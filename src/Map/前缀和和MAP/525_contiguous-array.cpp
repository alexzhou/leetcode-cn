class Solution {
public:
    int findMaxLength(vector<int>& nums) {
        int maxLength = 0;
        unordered_map<int, int> mp;
        int counter = 0;
        mp[counter] = -1;
        int n = nums.size();
        for (int i = 0; i < n; i++) {
            int num = nums[i];
            //counter 实际上就是前缀和
            if (num == 1) {
                counter++;
            } else {
                counter--;
            }
            if (mp.count(counter)) {
                int prevIndex = mp[counter];
                maxLength = max(maxLength, i - prevIndex);
            } else {
                mp[counter] = i;
            }
        }
        return maxLength;
    }
};
