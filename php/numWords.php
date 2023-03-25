<?php

  function numWords($string) {

    if (empty($string)) 
      return 0;

    $words = explode(' ', preg_replace('/\s+/', ' ', $string));

    return count($words);
  }

// // Test case where the input string has no words
try {
  $string = "";
  assert(numWords($string) == 0, "Test case 1 failed: Expected 0 words but got " . numWords($string) . ".");
} catch (AssertionError $e) {
  echo $e->getMessage();
}

// Test case where the input string has one word
try {
  $string = "Hello";
  assert(numWords($string) == 1, "Test case 2 failed: Expected 1 word but got " . numWords($string) . ".");
} catch (AssertionError $e) {
  echo $e->getMessage();
}

echo "<br>";

// Test case where the input string has multiple words
try {
  $string = "Hello world! This is a test.";
  assert(numWords($string) == 6, "Test case 3 failed: Expected 6 words but got " . numWords($string) . ".");
} catch (AssertionError $e) {
  echo $e->getMessage();
}

echo "<br>";

// Test case where the input string has extra spaces
try {
  $string = "   Hello    world!    ";
  assert(numWords($string) == 2, "Test case 4 failed: Expected 2 words but got " . numWords($string) . ".");
} catch (AssertionError $e) {
  echo $e->getMessage();
}

echo "<br>";

// Test case where the input string has special characters
try {
  $string = "Hello@world This^is*a:test";
  assert(numWords($string) == 6, "Test case 5 failed: Expected 6 words but got " . numWords($string) . ".");
} catch (AssertionError $e) {
  echo $e->getMessage();
}


?>