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
  $inputString =implode("",$input);
  $ct = 0;
    
  for( $i=0; $i < strlen($inputString); $i++) {
      for( $j=0; $j < strlen($inputString); $j++) {
          $ct++;
          $length = abs($j-$i);
              $substring = substr($inputString, $i, $length);
              $doesSubstringRepeat = strrpos($inputString,$substring) > $i;
              $substringLongerThanLongest = strlen($substring) > strlen($longestSubstring);
              if ($doesSubstringRepeat && $substringLongerThanLongest) {
                  $longestSubstring = $substring;
              }
      }
  }
  echo $ct;
  return strlen($longestSubstring) > 0 ? str_split($longestSubstring) : false;
}
var_dump(longest_subset(array('b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n')));
//var_dump(longest_subset(array('aa','a','a')));