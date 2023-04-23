/**
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number}
 */
var findMedianSortedArrays = function(nums1, nums2) {
    let merged = nums1.concat(nums2)
    merged.sort((a, b) => {
        return a-b
    })
    
    const len = merged.length
    const indexDivided = (len / 2)
    if ((len%2)==0) {
        // par
        const truncated = Math.trunc(indexDivided)
        return (merged[truncated-1] + merged[truncated]) / 2
    }
    // impar
    return merged[(len-1)/2]

};
