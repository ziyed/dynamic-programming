<?php
/**
 * Original Question: Largest repeated subset. Find the longest repeated subset 
 * of array elements in given array. 
 * Example Input: array('b','r','o','w','n','f','o','x','h','u','n','t','e',
 *                      'r','n','f','o','x','r','y','h','u','n') 
 * Example Output: the longest repeated subset will be array('n','f','o','x').
 *
 * Implementation: 
 * 
 * @author Travis Boudreaux <tjboudreaux@gmail.com>
 * @copyright Travis Boudreaux, 8 November, 2011
 * @uses InvalidArgumentException which requires PHP 5.3
 * @uses LengthException which requires PHP 5.3
 **/
function longest_subset ($input = array()) {
  
    $longestSubstring = "";
    $inputString = implode("",$input);

    for( $i=0; $i < count($input); $i++) {        
        for( $j=0; $j < count($input); $j++) {

            $length = abs($j-$i);
            $substring = implode("", array_slice($input, $i, $length));

            //echo $substring.'<br>';

            $doesSubstringRepeat = strrpos($inputString, $substring) > $i;
            $substringLongerThanLongest = strlen($substring) > strlen($longestSubstring);
            if ($doesSubstringRepeat && $substringLongerThanLongest) {
                $longestSubstring = $substring;
            }
        }
    }
    //echo $ct;
    return strlen($longestSubstring) > 0 ? str_split($longestSubstring) : false;
}
//longest_subset(array('b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n'));
longest_subset(array('aa','a','a'));