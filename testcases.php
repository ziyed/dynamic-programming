<?php

// here are some test-cases that your solution will be tested against, add more
//assert(solve([]) === []);

//assert(solve(['aa', 'a', 'a']) === ['a']);

//assert(solve(['b','r','o','w','n','f','o','x','h','u','n','t','e','r','n','f','o','x','r','y','h','u','n']) === ['n','f','o','x']);

//assert(solve(['b','a','n','a','n','a']) === ['a','n','a']);

// Interface should not be modified
//assert(function_exists('solve'));

//assert((new ReflectionFunction('solve'))->getParameters()[0]->isArray());

// type should match
assert(solve([0, 1, 0, '1', 0, 1, 0, 1]) === [0, 1, 0]);

// it should not care about what is in the list
//assert(solve(['a', 'b', 'c', 'ab', 'c', 'a', 'b']) === ['a', 'b']);

//assert(solve([null, null, null, null, null]) === [null, null, null, null]);

assert(solve([false, null, 0, false, null, '0']) === [false, null]);

$a = new StdClass();
//assert(solve([$a, $a, $a]) === [$a, $a]);

$b = clone $a;
assert(solve([$a, $b, $a, $b]) === [$a, $b]);

$c = function($a) {};
$d = function($b) {};
assert(solve([$c, $d, $c, $d]) === [$c, $d]);

//assert(solve([[],[], []]) === [[], []]);

