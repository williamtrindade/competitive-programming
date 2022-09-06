class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $stringArray = explode(' ', $s);

        $stringArray = array_filter($stringArray, function($item) {
            return ($item != '');
        });
        $stringArray = array_values($stringArray);
       
        $length = count($stringArray) - 1;

        $result = count(
            str_split($stringArray[$length])
        );
        return $result;
        
    }
}
