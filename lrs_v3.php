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

    if(empty($list)) return [];

    $N = count($list);
    $substrings = array();
    
    for ($i = 0; $i < $N; $i++){
      $k = 0;
      for($j=$i; $j<$N; $j++){
        $substrings[$i][$k++] = $list[$j];
      }      
    }   

    echo "<pre>";print_r($substrings);

    usort($substrings, function($a, $b) {
      return $a[0] > $b[0];
    });

    echo "<pre>";print_r($substrings);

    // $substrings = [
    //     0 => ['a'],
    //     1 => ['a','n','a'],
    //     2 => ['a','n','a','n','a'],
    //     3 => ['b','a','n','a','n','a'],
    //     4 => ['n','a'],
    //     5 => ['n','a','n','a']
    // ];

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


echo '<pre>'; print_r(solve(['b','a','n','a','n','a']));


// here are some test-cases that your solution will be tested against, add more
// assert(solve([]) === []);
// assert(solve(['aa', 'a', 'a']) === ['a']);
// assert(solve(['b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n']) === ['n','f','o','x']);
// assert(solve(['b','a','n','a','n','a']) === ['a','n','a']);
// // Interface should not be modified
// assert(function_exists('solve'));
// assert((new ReflectionFunction('solve'))->getParameters()[0]->isArray());

// // type should match
// assert(solve([0, 1, 0, '1', 0, 1, 0, 1]) === [0, 1, 0]);

// // it should not care about what is in the list
// assert(solve(['a', 'b', 'c', 'ab', 'c', 'a', 'b']) === ['a', 'b']);


