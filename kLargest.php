<?php

$myArray = array(1,2,9,8,4,3,5);
//select(array(1,2,9,8,4,3,5), 4);
//partition($myArray, 0, 6, 3);
quickSelect($myArray, 0, 6, 3);

function select($list, $k) {
	for ($i=0; $i < $k; $i++) {
		for ($j=$i+1; $j < count($list); $j++) {
			if ($list[$i] < $list[$j]) {
				$tmp = $list[$i];
				$list[$i] = $list[$j];
				$list[$j] = $tmp;
			}
		}
	}
	print_r($list);
	echo $list[$k-1];
}

function partition(&$list, $l, $r, $pivot) {
	$pivotValue = $list[$pivot];
	swap($list, $pivot, $r);
	$flag = $l;
	for ($i=$l; $i<$r; $i++) {
		if ($list[$i] > $pivotValue) {
			swap($list, $flag, $i);
			$flag++;
		}
	}
	swap($list, $r, $flag);
	return $flag;
}

function quickSelect(&$list, $left, $right, $k) {
	if ($left == $right) {
		print_r($list);print_r($list[$left]);
		return $list[$left];
	}

	$pivotIndex = floor(rand($left, $right));
	$pivotIndex = partition($list, $left, $right, $pivotIndex);

	if ($k == $pivotIndex) {
		print_r($list);print_r($list[$pivotIndex]);
		return $list[$pivotIndex];
	} else if ($k < $pivotIndex) {
		return quickSelect($list, $left, $pivotIndex-1, $k);
	} else {
		return quickSelect($list, $pivotIndex+1, $right, $k);
	}
}

function swap(&$list, $x, $y) {
	if ($x == $y) return;
	$tmp = $list[$x];
	$list[$x] = $list[$y];
	$list[$y] = $tmp;
}
