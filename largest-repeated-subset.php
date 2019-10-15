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
    
    for($i = 0; $i < count($list) ; $i++){
      if(is_string($list[$i]) && strlen($list[$i])>1){
        array_splice($list, $i, 1);
      }
    }

    $N = count($list);
    $substrings = array();
    
    for ($i = 0; $i < $N; $i++){
      $k = 0;
      for($j=$i; $j<$N; $j++){
        $substrings[$i][$k++] = $list[$j];
      }      
    }   

    usort($substrings, function($a,$b) {
        if(is_object($a[0])){
            return $a > $b;  
        }else{
            return strcmp(implode('', $a), implode('', $b));  
        }
    });

    $result = [];
    for ($i = 0; $i < $N - 1; $i++){
      $lcs = LongestCommonString($substrings[$i], $substrings[$i + 1]);
      if (count($lcs) > count($result)){
        $result = $lcs;
      }
    }
    return $result;
}

function LongestCommonString($a, $b){
	$n = min(count($a), count($b));
	$result = [];
	for ($i = 0; $i < $n; $i++){
    if ($a[$i] === $b[$i])
      array_push($result, $a[$i]);
		else
			break;
	}
	return $result;
}


assert(solve([]) === []);
assert(solve(['aa', 'a', 'a']) === ['a']);
assert(solve(['b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n']) === ['n','f','o','x']);
assert(solve(['b','a','n','a','n','a']) === ['a','n','a']);
assert(function_exists('solve'));
assert((new ReflectionFunction('solve'))->getParameters()[0]->isArray());
assert(solve(['a', 'b', 'c', 'ab', 'c', 'a', 'b']) === ['a', 'b']);
assert(solve([null, null, null, null, null]) === [null, null, null, null]);
$a = new StdClass();
assert(solve([$a, $a, $a]) === [$a, $a]);




