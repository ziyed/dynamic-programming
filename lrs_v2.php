<?php 

function LongestRepeatedSubstring($str)
{
	if ($str == null)
		return null;

	$N = strlen($str);
	$substrings = array();

	for ($i = 0; $i < $N; $i++)
	{
		$substrings[$i] = substr($str, $i);
  }
  
  
  echo "<pre>";print_r($substrings);
  

  sort($substrings);

  echo "<pre>";print_r($substrings);
  
 

	$result = "";

	for ($i = 0; $i < $N - 1; $i++)
	{
		$lcs = LongestCommonString($substrings[$i], $substrings[$i + 1]);

		if (strlen($lcs) > strlen($result))
		{
			$result = $lcs;
		}
	}

	return $result;
}

function LongestCommonString($a, $b)
{
	$n = min(strlen($a), strlen($b));
	$result = "";

	for ($i = 0; $i < $n; $i++)
	{
		if ($a[$i] == $b[$i])
			$result = $result . $a[$i];
		else
			break;
	}

	return $result;
}











$data = "brownfoxhunternfoxryhun";
$data = "banana";
//$data = '01010101';
$value = LongestRepeatedSubstring($data);


echo $value;