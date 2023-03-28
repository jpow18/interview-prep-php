<?php

  /*

    Returns true if the two strings given as arguments are anagrasm

    @params string $str1, $str2

    @return boolean true if $str1 and $str2 are anagrams, false otherwise

  */

  function areAnagrams($str1, $str2) {
    $str1Arr = array();
    $str2Arr = array();


    // Loop through each string
    // Add each letter in string to their array
    foreach (str_split($str1) as $char1) {
        array_push($str1Arr, $char1);
    }
    foreach (str_split($str2) as $char2) {
        array_push($str2Arr, $char2);
    }

    // If arrays are not the same size, return false
    if (count($str1Arr) != count($str2Arr)) {
      return false;
    }

    sort($str1Arr);
    sort($str2Arr);

    // Arrays are same length
    // Loop through and compare each index
    // If any are not the same, the strings are not anagrams
    for ($i = 0; $i < count($str1Arr); $i++) {
      if ($str1Arr[$i] != $str2Arr[$i]) {
        return false;
      }
    }

    return true;
  }

  try {
    assert(areAnagrams('listen', 'silent') === true, "Test case 1 failed");
    echo "Test 1 Passed";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";
  try {
    assert(areAnagrams('race', 'care') === true, "Test case 2 failed");
    echo "Test 2 Passed";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }
  
  echo "<br>";
  try {
    assert(areAnagrams('hello', 'world') === false, "Test case 3 failed");
    echo "Test 3 Passed";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";
  try {
    assert(areAnagrams('cat', 'tac') === true, "Test case 4 failed");
    echo "Test 4 Passed";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";
  try {
    $a = areAnagrams('aaa', 'a');
    assert(areAnagrams('aaa', 'a') === false, "Test case 5 failed");
    echo "Test 5 Passed";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";



?>