<?php
echo "hello";
echo "\n";

// Aapke liye kuch aur functions add kiye hain
echo "------- Welcome to PHP -------\n";

// 1. Simple calculation
$num1 = 10;
$num2 = 20;
$sum = $num1 + $num2;
echo "Sum of $num1 and $num2 is: $sum\n";

// 2. String manipulation
$name = "Laxmi";
$greeting = "Welcome, " . $name . "!";
echo $greeting . "\n";

// 3. Array example
$fruits = array("Apple", "Banana", "Mango", "Orange");
echo "\nFruits list:\n";
foreach ($fruits as $fruit) {
    echo "- " . $fruit . "\n";
}

// 4. Conditional statement
$age = 25;
if ($age >= 18) {
    echo "\nAap adult ho!\n";
} else {
    echo "\nAap minor ho!\n";
}

// 5. Simple function
function multiply($a, $b) {
    return $a * $b;
}
echo "5 * 6 = " . multiply(5, 6) . "\n";

echo "\n------- End -------\n";
?>
