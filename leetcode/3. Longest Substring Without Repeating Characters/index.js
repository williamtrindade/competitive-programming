/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLongestSubstring = function(s) {
    let max = 0

    for (let i = 0; i < s.length; i++) {
        let stringActual = s.charAt(i)
        let count = 1
        let j = i + 1
        for (j; j < s.length; j++) {
            if (!stringActual.includes(s.charAt(j))) {
                stringActual = stringActual + s.charAt(j)
                count++
            } else {
                break;
            }
         
        }
        if (count > max)
            max = count
    }
    return max
};
