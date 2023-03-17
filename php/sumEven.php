<?php

  function sumEven($arr) {
    $sum = 0;
    foreach ($arr as $num) {
      if ($num % 2 == 0) {
        $sum += $num;
      }
    }

    return $sum;
  }

  $arr = array (
    1, 2, 3, 4, 5, 6, 7, 8, 9, 10
  );

  echo sumEven($arr);
