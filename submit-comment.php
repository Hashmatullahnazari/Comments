<?php


// connect to database using MySQLi procedural interface
$conn = mysqli_connect("localhost", "root", "", "comments");

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// interpolate sanitized form data into SQL query string
$sql = "INSERT INTO comments (name, email, comment, created_at) VALUES ('" . mysqli_real_escape_string($conn, $_POST["name"]) . "', '" . mysqli_real_escape_string($conn, $_POST["email"]) . "', '" . mysqli_real_escape_string($conn, $_POST["comment"]) . "', '" . date("Y-m-d H:i:s") . "')";

// execute SQL query
if (mysqli_query($conn, $sql)) {
  echo "Comment submitted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);




?>


<?php
// connect to database
//$conn = mysqli_connect("localhost", "root", "", "comments");

// check connection
//if (!$conn) {
//  die("Connection failed: " . mysqli_connect_error());
//}

// get form data and sanitize
//$name = mysqli_real_escape_string($conn, $_POST["name"]);
//$email = mysqli_real_escape_string($conn, $_POST["email"]);
//$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
//$created_at = date("Y-m-d H:i:s");

// prepare and execute SQL query
//$stmt = mysqli_prepare($conn, "INSERT INTO comments (name, email, comment, created_at) VALUES (?, ?, ?, ?)");
//mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $comment, $created_at);
//
//if (mysqli_stmt_execute($stmt)) {
//  echo "Comment submitted successfully";
//} else {
//  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}

// close database connection
//mysqli_stmt_close($stmt);
//mysqli_close($conn);
?>
