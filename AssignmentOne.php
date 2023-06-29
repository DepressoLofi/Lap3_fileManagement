<?php

// Function to check if a number is prime
function isPrime($number) {
    if ($number < 2) {
        return false;
    }
    
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    
    return true;
}

// Function to count the number of prime numbers in a given range
function countPrimes($startNum, $endNum) {
    $count = 0;
    
    for ($number = $startNum; $number <= $endNum; $number++) {
        if (isPrime($number)) {
            $count++;
        }
    }
    
    return $count;
}

$startNum = 1; 
$endNum = 25;

$count = countPrimes($startNum, $endNum);

echo "The number of prime numbers between $startNum and $endNum is: $count";
?>