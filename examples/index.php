<?php

use soonio\rc\RedemptionCode;

include __DIR__ . '/../vendor/autoload.php';

const LETTERS = [
    'H', 'I', 'J', 'K', 'L', '8', '9',
    '3', '4', '5', 'O', 'P', 'Q', 'G',
    'V', 'W', '1', '2', 'X', 'Y', 'Z',
    'A', 'B', 'C', 'D', 'S', 'T', 'U',
    '6', '7', 'M', 'N', 'R', 'E', 'F',

];

$rc = new RedemptionCode(LETTERS, 20);

$code = $rc->generate();
echo "redemption code is: {$code}\n";


$bool = $rc->verify($code);
echo $bool ? "verified \n" : "error code\n";
