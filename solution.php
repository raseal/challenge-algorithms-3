<?php

function perm_alone(string $seed): int
{
	$length = strlen($seed);
	$valid_permutations = 0;

	permute($seed, 0, $length - 1, $permutations);

	foreach($permutations as $permutation) {
		if(should_allow_this_permutation($permutation)) {
			$valid_permutations++;
		}
	}

	return $valid_permutations;
}

// Obtains all possible permutations of a given string (with repetitions)
function permute(string $value, int $starting_index, int $end_index, ?array &$permutations): void
{
    if ($starting_index == $end_index) {
    	$permutations[] = $value;
    } else {
        for ($i = $starting_index; $i <= $end_index; $i++) {
            $value = swap($value, $starting_index, $i);
            permute($value, $starting_index + 1, $end_index, $permutations);
            $value = swap($value, $starting_index, $i);
        }
    }
}

// Swaps the position of two adjacents chars
function swap(string $value, int $left_pos, int $right_pos): string
{
    $chars_as_array = str_split($value);
    $temp = $chars_as_array[$left_pos] ;
    $chars_as_array[$left_pos] = $chars_as_array[$right_pos];
    $chars_as_array[$right_pos] = $temp;

    return implode($chars_as_array);
}

// Determine if a given permutation is valid or not
function should_allow_this_permutation(string $permutation): bool
{
	// Detects two or more repeated consecutive characters
	$regexp = '`(.)\1+`';
	preg_match($regexp, $permutation, $matches);

	return count($matches) === 0;
}


// Let's try the algorithm with some tests!
try {
	evaluate(2, perm_alone('aab'));
	evaluate(0, perm_alone('aaa'));
	evaluate(8, perm_alone('aabb'));
	evaluate(3600, perm_alone('abcdefa'));
	evaluate(2640, perm_alone('abfdefa'));
	evaluate(0, perm_alone('zzzzzzzz'));
	evaluate(1, perm_alone('a'));
	evaluate(0, perm_alone('aaab'));
	evaluate(12, perm_alone('aaabb'));
	
	echo "All tests passed!";


} catch(Exception $e) {
	echo $e->getMessage()."<br>";
}

/*
 * The purpose of this function is only to make sure the algorithm works as expected.
*/
function evaluate($expected, $value): bool
{
	if($expected !== $value) {
		throw new Exception('ERROR: Expecting ['.implode(',', $expected).'], got ['.implode(',', $value).']');
	}

	return true;
}
