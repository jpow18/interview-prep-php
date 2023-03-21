<?php
  /*
    Finds the longest palindrome substring in a string
  
    @param string $string to search for palindromes within

    @return string|null Returns a string of the longest substring palindrome
      contained within the param string, if there is one. 

    If no palindrome, returns null
  */
  function longestPalindrome(string $string) {
    $string = strtolower(preg_replace('/[^\p{L}\p{N}]+/u', '', trim($string)));
    $strLength = strlen($string);
    $start = 0;
    $maxLength = 0;

    for ($i = 0; $i < $strLength; $i++) {
      // Check odd length palindrome
      $left = $i;
      $right = $i;
      while ($left >= 0 && $right < $strLength && $string[$left] == $string[$right]) {
        $pLength = $right - $left + 1;
        if ($pLength > $maxLength) {
          $start = $left;
          $maxLength = $pLength;
        }
        $left--;
        $right++;
      }
    

      // Check even length palindromes
      $left = $i;
      $right = $i + 1;
      while ($left >= 0 && $right < $strLength && $string[$left] == $string[$right]) {
        $pLength = $right - $left + 1;
        if ($pLength > $maxLength) {
          $start = $left;
          $maxLength = $pLength;
        }
        $left--;
        $right++;
      }
    }
    return substr($string, $start, $maxLength);
  }

  // Test case 1: simple string, palindrome substring at beginning
  $input = "racecarisawesome";
  $expected_output = "racecar";
  try {
    assert(longestPalindrome($input) === $expected_output, "Test case 1 failed.");
    echo "Test case 1 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 2: simple string, longest palindrome substring at the end
  $input = "awesomemadamracecar";
  $expected_output = "racecar";
  try {
    assert(longestPalindrome($input) === $expected_output, "Test case 2 failed.");
    echo "Test case 2 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 3: string where there are multiple palindrome substrings of same length
  $input = "abcdcbaxabba";
  $expected_output = "abcdcba";
  try {
    assert(longestPalindrome($input) === $expected_output, "Test case 3 failed.");
    echo "Test case 3 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 4: string with non-alphabetic characters
  $input = "A man, a plan, a canal: Panama!";
  $expected_output = "amanaplanacanalpanama";
  try {
    assert(longestPalindrome($input) === $expected_output, "Test case 4 failed.");
    echo "Test case 4 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

  // Test case 5: empty string
  $input = "";
  $expected_output = "";
  try {
    assert(longestPalindrome($input) === $expected_output, "Test case 5 failed.");
    echo "Test case 5 passed!";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }




?>