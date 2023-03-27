<?php

  /**

    Finds all pairs of integers in an input array that add up to a given sum.

    @param array $numbers An array of integers to search for pairs.

    @param int $sum The sum that pairs of integers should add up to.

    @return array|null Returns an array of pairs of integers that add up to the given sum.

    If there are no pairs found or the input array contains less than two elements, it returns null.
  */
  function findPairs(array $numbers, int $sum): ?array {
    if (count($numbers) <= 1) {
      return null;
    }

    $sumArray = array();

    // Loop array
    foreach ($numbers as $number1) {
      foreach ($numbers as $number2) {
        // if pair found that adds to sum, check $sumArray to see if that pair is already in there
        // add if not, skip if so
        if ($number1 + $number2 == $sum && 
        !(in_array([$number1, $number2], $sumArray) || in_array([$number2, $number1], $sumArray))) {
          array_push($sumArray, [$number1, $number2]);
        }
      }
    }    
    
    // If no pairs, return null
    if (empty($sumArray)) {
      return null;
    }

    // Sort array if $sum is negative
    if ($sum < 0) {
      rsort($sumArray);
      for ($i = 0; $i < count($sumArray); $i++) {
        sort($sumArray[$i]);
      }
    }
    

    // return array of found pairs
    return $sumArray;
  }


  // Test case 1: Basic input with three pairs
  $testArray1 = [1, 2, 3, 4, 5];
  $testSum1 = 6;
  $expectedOutput1 = [[1, 5], [2, 4], [3, 3]];
  $actualOutput1 = findPairs($testArray1, $testSum1);
  try {
    assert($actualOutput1 === $expectedOutput1, "Test case 1 failed ");
    echo "Test case 1 passed.\n";
  } catch (AssertionError $e) {
  echo $e->getMessage();
  }

  echo "<br>";

  // Test case 2: Basic input with one pair
  $testArray2 = [1, 2, 3, 4, 5];
  $testSum2 = 7;
  $expectedOutput2 = [[2, 5], [3, 4]];
  $actualOutput2 = findPairs($testArray2, $testSum2);
  try {
    assert($actualOutput2 === $expectedOutput2, "Test case 2 failed");
    echo "Test case 2 passed.\n";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  // Test case 3: Input with no pairs
  $testArray3 = [1, 2, 3, 4, 5];
  $testSum3 = 11;
  $expectedOutput3 = null;
  $actualOutput3 = findPairs($testArray3, $testSum3);
  try {
  assert($actualOutput3 === $expectedOutput3, "Test case 3 failed");
  echo "Test case 3 passed.\n";
  } catch (AssertionError $e) {
  echo $e->getMessage();
  }

  echo "<br>";

  // Test case 4: Input with negative numbers
  $testArray4 = [1, -2, 3, -4, 5];
  $testSum4 = -1;
  $expectedOutput4 = [[-4, 3], [-2, 1]];
  $actualOutput4 = findPairs($testArray4, $testSum4);
  try {
  assert($actualOutput4 === $expectedOutput4, "Test case 4 failed");
  echo "Test case 4 passed.\n";
  } catch (AssertionError $e) {
  echo $e->getMessage();
  }

  echo "<br>";

  // Test case 5: Input with repeated numbers
  $testArray5 = [1, 2, 3, 3, 4, 5];
  $testSum5 = 6;
  $expectedOutput5 = [[1, 5], [2, 4], [3, 3]];
  $actualOutput5 = findPairs($testArray5, $testSum5);
  try {
    assert($actualOutput5 === $expectedOutput5, "Test case 5 failed");
    echo "Test case 5 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }
?>