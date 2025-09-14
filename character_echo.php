<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gamearchive';

$conn = mysqli_connect($host, $user, $pass, $db);

$query3 = mysqli_query($conn, "SELECT * FROM characters");

while ($row = mysqli_fetch_array($query3)) {
    echo "<section class='card' style='width: 20rem;'>";
    echo "<img src='images/" . $row['Appearance'] . "' class='card-img-top'/>";
    echo "<section class='card-body'><p class='card-text'>Name: " . $row['Name'] . "<br/> ";
    echo "Surname: " . $row['Surname'] . "<br/> ";
    echo "Age: " . $row['Age'] . "<br/>";
    echo "Gender: " . $row['Gender'] . "<br/> ";
    echo "Pronouns: " . $row['Pronouns'] . "<br/> ";
    echo "Race: " . $row['Race'] . "<br/> ";
    echo "Category: " . $row['Category'] . "<br/> ";
    echo "Height: " . $row['Height'] . "<br/> ";
    echo "Team: " . $row['Team'] . "<br/> ";
    echo "Status: " . $row['Status'] . "</p>";
    echo "</section>";
    echo "</section>";  
}