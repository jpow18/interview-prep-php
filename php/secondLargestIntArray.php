<?php

  /**
  * Searches array and returns the second highest number
  * If the input array is empty or contains only one element, the function returns null.
  *
  * @param array $numbers An array of integers to sum.
  * @return int The value of the second highest number, or null if
  * the array is empty or contains only one element.
  * @throws TypeError If $numbers is not an array or contains non-integer values.
  */

  function secondLargestIntArray(array $arr): ?int {
    if (count($arr) <= 1) {
      return null;
    }

    $largest = 0;
    $secondLargest = 0;

    foreach ($arr as $number) {
      if ($number > $largest) {
        $largest = $number;
      } else if ($number > $secondLargest && $number < $largest) {
        $secondLargest = $number;
      }
    }

    if (!is_int($largest) || !is_int($secondLargest)) {
      throw new TypeError("The input array must contain" .
      " only integers.");
    }

    return $secondLargest;
  }

  $numbers = array(1, 2, 47, 3, 4, 5, 22, 6, 7, 8, 9);
  $nullArray = array(1);
  $errorArray = array('a', '5', 10);

  $result = secondLargestIntArray($numbers);

  if ($result) {
    echo "The second largest number in the array is: " . $result;
  } else {
    echo "The array had only 1 or fewer elements.";
  }

?>