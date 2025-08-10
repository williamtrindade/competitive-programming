class Solution(object):
    def majorityElement(self, nums):
        cont = 1
        elem = nums[0]

        for i, j in enumerate(nums):
            if i == 0:
                continue
            if cont == 0:
                elem = j
            if elem != j:
                cont -= 1
            else:
                cont += 1
        return elem

"""
Given an array nums of size n, return the majority element.

The majority element is the element that appears more than ⌊n / 2⌋ times. You may assume that the majority element always exists in the array.



Example 1:

Input: nums = [3,2,3]
Output: 3
Example 2:

Input: nums = [2,2,1,1,1,2,2]
Output: 2


Constraints:

n == nums.length
1 <= n <= 5 * 104
-109 <= nums[i] <= 109


Follow-up: Could you solve the problem in linear time and in O(1) space?

"""