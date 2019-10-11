<?php

/**
 * Largest repeated subset.
 * Find the longest repeated subset of array elements in given array. For example,
 * for array('b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n')
 * the longest repeated subset will be array('n','f','o','x').
 * 
 * @param array $list
 * @return array
 */
function solve(Array $list) {
  $longestSubstring = "";
  $inputString = implode("",$list);

  for( $i=0; $i < count($list); $i++) {        
    for( $j=0; $j < count($list); $j++) {

      $length = abs($j-$i);
      $substring = implode("", array_slice($list, $i, $length));

      $doesSubstringRepeat = strrpos($inputString, $substring) > $i;
      $substringLongerThanLongest = strlen($substring) > strlen($longestSubstring);
      if ($doesSubstringRepeat && $substringLongerThanLongest) {
        $longestSubstring = $substring;
      }
    }
  }
  
  return strlen($longestSubstring) > 0 ? array_unique(str_split($longestSubstring)) : [];
}

// here are some test-cases that your solution will be tested against, add more
assert(solve([]) === []);
assert(solve(['aa', 'a', 'a']) === ['a']);
assert(solve(['b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n']) === ['n','f','o','x']);


