<?php

  /*
  * Searches array and returns the maximum sum of contiguous subarray
  * If the input array is empty, the function returns null.
  * @param array $arr An array of integers to search for the maximum sum of contiguous subarray.
  * @return int|null The maximum sum of contiguous subarray or null if the array is empty.
  * @throws TypeError If $arr is not an array or contains non-integer values.
  */
  function kadanesAlgorithm($arr): ?int {
    if (count($arr) < 1) {
      return null;
    }

    $maxSoFar = PHP_INT_MIN;
    $maxEndingHere = 0;

    foreach ($arr as $number) {
      $maxEndingHere += $number;

      if ($maxSoFar < $maxEndingHere) {
        $maxSoFar = $maxEndingHere;
      }

      if ($maxEndingHere < 0) {
        $maxEndingHere = 0;
      }
    }
    return $maxSoFar;
  }

  // Test case 1: Basic input with positive numbers
  $testArray1 = [1, 2, 3, 4, 5];
  $expectedOutput1 = 15;
  $actualOutput1 = kadanesAlgorithm($testArray1);
  try {
    assert($actualOutput1 === $expectedOutput1, "Test case 1 failed");
    echo "Test case 1 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 2: Basic input with negative numbers
  $testArray2 = [-1, -2, -3, -4, -5];
  $expectedOutput2 = -1;
  $actualOutput2 = kadanesAlgorithm($testArray2);
  try {
    assert($actualOutput2 === $expectedOutput2, "Test case 2 failed");
    echo "Test case 2 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 3: Input with mix of positive and negative numbers
  $testArray3 = [-2, 1, -3, 4, -1, 2, 1, -5, 4];
  $expectedOutput3 = 6;
  $actualOutput3 = kadanesAlgorithm($testArray3);
  try {
    assert($actualOutput3 === $expectedOutput3, "Test case 3 failed");
    echo "Test case 3 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 4: Input with all negative numbers
  $testArray4 = [-5, -2, -3, -1, -4];
  $expectedOutput4 = -1;
  $actualOutput4 = kadanesAlgorithm($testArray4);
  try {
    assert($actualOutput4 === $expectedOutput4, "Test case 4 failed");
    echo "Test case 4 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 5: Input with all positive numbers
  $testArray5 = [4, 2, 3, 1, 5];
  $expectedOutput5 = 15;
  $actualOutput5 = kadanesAlgorithm($testArray5);
  try {
    assert($actualOutput5 === $expectedOutput5, "Test case 5 failed");
    echo "Test case 5 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }
?>