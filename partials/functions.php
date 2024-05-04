<?php

function passwordGenerator($numOfChars)
{
    $bytes =  range(33, 126);
    $allChars = array_map('chr', $bytes);
    $allCharsString = implode($allChars);
    return substr(str_shuffle($allCharsString), 0, $numOfChars);
}
