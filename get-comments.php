<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "", "comments");

// check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// retrieve comments from database
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);

if (!$result) {
  echo "Error: " . mysqli_error($conn);
  exit();
}

// display comments
while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='comment'>";
  echo "<h3>" . $row['name'] . "</h3>";
  echo "<p>" . $row['comment'] . "</p>";
  echo "<span class='date'>Posted on " . date('F j, Y \a\t g:i A', strtotime($row['created_at'])) . "</span>";
  echo "</div>";
}

// close database connection
mysqli_close($conn);
?>
