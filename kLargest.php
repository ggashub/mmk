<?php

select(array(1,2,9,8,4,3,5), 4);

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
