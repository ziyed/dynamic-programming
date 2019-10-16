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

    $longestSubstring = [];
    
    for($i = 0; $i < count($list) ; $i++){
        for( $j=1+$i; $j <= count($list); $j++) {
            $length = abs($j-$i);

            $subStringArray = array_slice($list, $i, $length); 

            $subStringLength = count($subStringArray);
            for($k = 0; $k < count($list); $k++){
                $checkStringArray = array_slice($list, $k, $subStringLength);
                if(count($checkStringArray) == $subStringLength){
                  $check = compareArray($subStringArray, $checkStringArray);
                  if ($check && ($k > $i) ) {
                     if( $subStringLength > count($longestSubstring)){
                        $longestSubstring = $subStringArray;
                     }
                  }
                }
            } 
        }
    }
    return $longestSubstring;
}

function compareArray($a, $b){
  $return = false;
  if(count($a) == count($b)){
      $return = true;
      for($i = 0; $i < count($a); $i++){
         if($a[$i] !== $b[$i]){
           $return = false;
         }
      }
  }

  return $return;
}


assert(solve([]) === []);
assert(solve(['aa', 'a', 'a']) === ['a']);
assert(solve(['b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n']) === ['n','f','o','x']);
assert(solve(['a', 'b', 'c', 'ab', 'c', 'a', 'b']) === ['a', 'b']);
assert(solve([null, null, null, null, null]) === [null, null, null, null]);
$a = new StdClass();
assert(solve([$a, $a, $a]) === [$a, $a]);
assert(solve([[],[], []]) === [[], []]);
assert(function_exists('solve'));
assert((new ReflectionFunction('solve'))->getParameters()[0]->isArray());
assert(solve(['b','a','n','a','n','a']) === ['a','n','a']);
assert(solve([0, 1, 0, '1', 0, 1, 0, 1]) === [0, 1, 0]);
assert(solve([false, null, 0, false, null, '0']) === [false, null]);
$b = clone $a;
assert(solve([$a, $b, $a, $b]) === [$a, $b]);
$c = function($a) {};
$d = function($b) {};
assert(solve([$c, $d, $c, $d]) === [$c, $d]);











