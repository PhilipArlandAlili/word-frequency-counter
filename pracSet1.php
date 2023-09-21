<?php
/**
 * This function calculates the total price in an associative array demonyo ka.
 * Then echoes the total price.
 */
function calculateTotalPrice()
{
    $items = [
        ['name' => 'Widget A', 'price' => 10],
        ['name' => 'Widget B', 'price' => 15],
        ['name' => 'Widget C', 'price' => 20],
    ];
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'];
    }

    echo "Total price: $" . $total;
}

calculateTotalPrice();

/**
 * This function removes the spaces from string and 
 * convert the string into lowercase
 */
function removeSpacesAndLowercase()
{
    $string = "This is a poorly written program with little structure and readability.";
    // Remove spaces and convert to lowercase
    $string = str_replace(' ', '', $string);
    $string = strtolower($string);
    // Display the modified string
    echo "\nModified string: " . $string;
}
echo "<br>";
removeSpacesAndLowercase();




    // Check if a number is even or odd
function displayEvenOrOdd() {
    $number = 42;
    if ($number % 2 == 0) {
        echo "\nThe number " . $number . " is even.";
    } else {
        echo "\nThe number " . $number . " is odd.";
    }
}
echo "<br>";
displayEvenOrOdd();