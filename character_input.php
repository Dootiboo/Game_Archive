<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gamearchive';

$conn = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $age = $_POST['age'];
  $height = $_POST['height'];
  $gender = $_POST['gender'];
  $pronouns = $_POST['pronouns'];
  $race = $_POST['race'];
  $appearance = $_POST['appearance'];
  $category = $_POST['category'];
  $hero_team = $_POST['hero_team'];
  $status = $_POST['status'];

  $query = mysqli_query($conn, "INSERT INTO characters VALUES (null, '$name', '$surname', '$age', '$height', '$gender', '$pronouns', '$race', '$appearance', '$category', '$hero_team', '$status')");
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
