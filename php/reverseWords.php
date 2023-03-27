<?php

  /**

    Reverses all words found in string input. A word is a sequence of 
    non-space characters seperated by a space

    @param string $str a string to reverse the words found within

    @param int $sum The sum that pairs of integers should add up to.

    @return string|null Returns a string with each word reversed

    If string is empty, returns null
  */

  function reverseWords($str): ?string {
    // Special case, empty string
    if (empty($str)) {
      return null;
    }

    // Special case, one character string
    if (strlen($str) <= 1) {
      return $str;
    }

    // Explode the string into seperate words in an array
    $words = explode(' ', $str);

    $finalArray = array();

    // Loop array, reversing each word
    foreach ($words as $word) {
      for ($i = 0; $i < strlen($word) / 2; $i++) {
        $temp = $word[$i];
        $word[$i] = $word[strlen($word) - 1 - $i];
        $word[strlen($word) - 1 - $i] = $temp;
      }
      array_push($finalArray, $word);
    }
    
    return implode(' ', $finalArray);

  }


  // Test case 1: String with multiple words
  try {
    $str = "The quick brown fox jumps over the lazy dog";
    assert(reverseWords($str) == "ehT kciuq nworb xof spmuj revo eht yzal god", "Test case 1 failed: Expected 'ehT kciuq nworb xof spmuj revo eht yzal god' but got '" . reverseWords($str) . "'.");
    echo "Test 1 Passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  // Test case 2: String with one word
  try {
    $str = "Hello";
    assert(reverseWords($str) == "olleH", "Test case 2 failed: Expected 'olleH' but got '" . reverseWords($str) . "'.");
    echo "Test 2 Passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  // // Test case 3: String with leading and trailing spaces
  try {
    $str = "   The quick brown fox jumps over the lazy dog   ";
    assert(reverseWords($str) == "   ehT kciuq nworb xof spmuj revo eht yzal god   ", "Test case 3 failed: Expected '   ehT kciuq nworb xof spmuj revo eht yzal god   ' but got '" . reverseWords($str) . "'.");
    echo "Test 3 Passed.";
  } catch (AssertionError $e) {
      echo $e->getMessage();
  }

  echo "<br>";

  // Test case 4: String with multiple spaces between words
  try {
    $str = "The   quick     brown fox jumps  over   the lazy dog";
    assert(reverseWords($str) == "ehT   kciuq     nworb xof spmuj  revo   eht yzal god", "Test case 4 failed: Expected 'ehT   kciuq     nworb xof spmuj  revo   eht yzal god' but got '" . reverseWords($str) . "'.");
    echo "Test 4 Passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";

  // Test case 5: Empty string
  try {
    $str = "";
    assert(reverseWords($str) == "", "Test case 5 failed: Expected '' but got '" . reverseWords($str) . "'.");
    echo "Test 5 Passed.";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  echo "<br>";


?>