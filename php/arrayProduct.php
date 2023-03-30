<?php

  function arrayProduct($arr): ?array {
    if (empty($arr)) {
      return null;
    }

    $arrayProduct = array();

    for ($i = 0; $i < count($arr); $i++) {
      $product = 1;
      for ($j = 0; $j < count($arr); $j++) {
        if ($j === $i) {
          continue;
        } 

        $product *= $arr[$j];
      }
      array_push($arrayProduct, $product);
    }

    return $arrayProduct;
  }

  try {
  assert(arrayProduct([1, 2, 3, 4, 5]) === [120, 60, 40, 30, 24], "Test case 1 failed");
  echo "Test 1 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  try {
    assert(arrayProduct([2, 4, 6, 8, 10]) === [1920, 960, 640, 480, 384], "Test case 2 failed");
    echo "Test 2 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }   

  echo "<br>";

  try {
    assert(arrayProduct([0, 1, 2, 3, 4]) === [24, 0, 0, 0, 0], "Test case 3 failed");
    echo "Test 3 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  try {
    assert(arrayProduct([5, 5, 5, 5, 5]) === [625, 625, 625, 625, 625], "Test case 4 failed");
    echo "Test 4 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  try {
    assert(arrayProduct([3, -2, 4]) === [-8, 12, -6], "Test case 5 failed");
    echo "Test 5 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }


?>