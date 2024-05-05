<?php

function passwordGenerator($array, $numOfChars)
{
    $allCharsString = implode($array);
    return substr(str_shuffle($allCharsString), 0, $numOfChars);
}

// function array_push_assoc($array, $key, $value)
// {
//     $array[$key] = $value;
//     return $array;
// }

// $bytes =  range(33, 126);
// $allChars = array_map('chr', $bytes);
// $allCharsString = implode($allChars);
// return substr(str_shuffle($allCharsString), 0, $numOfChars);
