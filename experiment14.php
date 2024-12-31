<!DOCTYPE html>
<html>
<head>
    <title>Student Array Sorting</title>
</head>
<body>
<?php
// Store student names in an array
$students = array("Alice", "Bob", "Charlie", "David", "Eve");

echo "<h2>Original Array:</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Sort in ascending order
asort($students);
echo "<h2>Array Sorted in Ascending Order (asort):</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";

// Sort in descending order
arsort($students);
echo "<h2>Array Sorted in Descending Order (arsort):</h2>";
echo "<pre>";
print_r($students);
echo "</pre>";
?>
</body>
</html>
