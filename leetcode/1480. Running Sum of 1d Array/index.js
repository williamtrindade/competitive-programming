/**
 * @param {number[]} nums
 * @return {number[]}
 */
var runningSum = function(nums) {
    let responseVector = []
    let lastSum = 0
    for (let i = 0; i < nums.length; i++) {
        const sum = lastSum + nums[i]
        responseVector[i] = sum
        lastSum = sum
    }
    return responseVector
};
