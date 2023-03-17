<?php

  /**
   * Sums the first and last elements of an array of integers.
   * If the input array is empty or contains only one element, the function returns 0.
   * 
   * @param array $numbers An array of integers to sum.
   * @return int The sum of the first and last elements of the input array, or 0 if 
   * the array is empty or contains only one element.
   * @throws TypeError If $numbers is not an array or contains non-integer values.
   */
  function sumFirstLastArray(array $arr): int {
    if (count($arr) <= 1) {
      return 0;
    }

    $first = $arr[0];
    $last = $arr[count($arr) - 1];
    if (!is_int($first) || !is_int($last)) {
      throw new TypeError("The input array must contain" . 
      " only integers.");
    }

    return $first + $last;
  }


  $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10); 
  $errorArr = array('a', 1, 5, 9);

  $sum = sumFirstLastArray($numbers);

  echo "The sum of the first and last elements of the array are: " . $sum;
?>