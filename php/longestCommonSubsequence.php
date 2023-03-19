<?php

  /*
  * Searches two strings and returns the longest common subsequence
  * If either of the input strings are empty, the function returns null.
  *
  * @param two strings to compare
  * @return string of longest common subsequence or null if either string
  * is empty.
  */
  function longestCommonSubsequence(string $str1, string $str2): ?string {
    if (strlen($str1) < 1 || strlen($str2) < 1) {
      return null;
    }

    $subsequence = "";

    foreach (str_split($str1) as $char1) {
      foreach (str_split($str2) as $char2) {
        if ($char1 === $char2) {
          $subsequence .= $char1;
        }
      }
    }

    return $subsequence;
  }

  $string1 = "ABCDGH";
  $string2 = "AEDFHR";

  $result = longestCommonSubsequence($string1, $string2);

  if ($result === null) {
    echo "One of the strings is empty.";
  } else {
    echo $result;
  }

?>