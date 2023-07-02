<?php
echo "<h1>Problem 1</h1>";
function twoSum($nums, $target)
{
    $twoNums = [];
    for ($x = 0; $x < count($nums) - 1; $x++) {
        for ($y = $x + 1; $y < count($nums); $y++) {
            if ($nums[$x] + $nums[$y] == $target) {
                $twoNums[0] = $x;
                $twoNums[1] = $y;
                return $twoNums;
            }
        }
    }
    return $twoNums;
}
$nums = [5, 3, 4, 0, 1, 1];
$target = 2;
$ans = implode(", ", twoSum($nums, $target));

echo   " List of array: " . implode(" , ", $nums);
echo " <br>";
echo "The sum of two numbers from the array: " . $target;
echo "<br>";
echo "The index of two element in the array: " . $ans;
