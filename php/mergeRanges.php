<?php

function mergeRanges(array $ranges): array {
    // Sort ranges by start time
    usort($ranges, function ($a, $b) {
      return $a[0] - $b[0];
    });

    $merged = array($ranges[0]);

    foreach ($ranges as $range) {
      $last_merged = end($merged);

      if ($range[0] <= $last_merged[1]) {
        $last_merged[1] = max($last_merged[1], $range[1]);
      } else {
        array_push($merged, $range);
      }
    }

    return $merged;
  }

  $ranges = array(
    array(0, 1),
    array(3, 5),
    array(4, 8),
    array(10, 12),
    array(9, 10)
  );

  $result = mergeRanges($ranges);
  $expected = array(
    array(0, 1),
    array(3, 8),
    array(9, 12)
  );
  var_dump($result);

  try {
    assert($result === $expected, "Test case 1 failed");
    echo "Test case 1 passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // echo "<br>";

  // $ranges = array(
  //   array(1, 2),
  //   array(2, 3)
  // );
  // $result = mergeRanges($ranges);
  // $expected = array(
  //   array(1, 3)
  // );

  // try {
  //   assert($result === $expected, "Test case 2 failed");
  //   echo "Test 2 passed.";
  // } catch (AssertionError $e) {
  //   $e->getMessage();
  // }

  // echo "<br>";

  // $ranges = array(
  //   array(1, 5),
  //   array(2, 3)
  // );
  // $result = mergeRanges($ranges);
  // $expected = array(
  //   array(1, 5)
  // );
  // try {
  //   assert($result === $expected, "Test case 3 failed");
  //   echo "Test 3 passed";
  // } catch (AssertionError $e) {
  //   echo $e->getMessage();
  // }

  // echo "<br>";

  // $ranges = array(
  //   array(1, 10),
  //   array(2, 6),
  //   array(3, 5),
  //   array(7, 9)
  // );
  // $result = mergeRanges($ranges);
  // $expected = array(
  //   array(1, 10)
  // );
  // try {
  //   assert($result === $expected, "Test case 4 failed");
  //   echo "Test 4 passed";
  // } catch (AssertionError $e) {
  //   echo $e->getMessage();
  // }

  // echo "<br>";

  // $ranges = array();

  // $result = mergeRanges($ranges);
  // $expected = array();
  // try {
  //   assert($result === $expected, "Test case 5 failed");
  //   echo "Test 5 passed";
  // } catch (AssertionError $e) {
  //   echo $e->getMessage();
  // }



?>