<?php

  function mostFrequentChar($string): array|string {
    if (empty($string)) {
      return "";
    }

    if (strlen($string) <= 1) {
      return $string;
    }

    $charArray = array();
    
    // Fill $charArray with the characters in $string
    // and keep track of number of each character
    foreach (str_split($string) as $char) {
      if (!isset($charArray[$char])) {
        $charArray[$char] = 0;
      } 
      $charArray[$char]++;
    }

    $maxCount = 0;
    $maxChars = array();

    // Find the character(s) with the highest count
    foreach ($charArray as $char => $count) {
      if ($count > $maxCount) {
        $maxCount = $count;
        $maxChars = array($char);
      } elseif ($count == $maxCount) {
        array_push($maxChars, $char);
      }
    }

    if (count($maxChars) == 1) {
      return $maxChars[0];
    } else {
      return $maxChars;
    }

    return $charArray;
  }

  try {
    assert(mostFrequentChar("hello") === "l", "Test case 1 failed.   ");
    echo "Test case 1 passed!";

    echo "<br>";

    assert(mostFrequentChar("world") === ["w", "o", "r", "l", "d"], "Test case 2 failed");
    echo "Test case 2 passed!";

    echo "<br>";

    assert(mostFrequentChar("aabbcc") === ["a", "b", "c"], "Test case 3 failed");
    echo "Test case 3 passed!\n";

    echo "<br>";

    assert(mostFrequentChar("") === "", "Test case 4 failed");
    echo "Test case 4 passed!\n";

    echo "<br>";

    assert(mostFrequentChar("abc") === ["a", "b", "c"], "Test case 5 failed");
    echo "Test case 5 passed!\n";
  } catch (AssertionError $e) {
    echo $e->getMessage();
  }

?>