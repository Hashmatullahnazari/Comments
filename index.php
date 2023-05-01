<!DOCTYPE html>
<html>
<head>
  <title>Comment System</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>


 <div id="form-container">
  <h1>Comment System</h1>


  <form id="comment-form" method="post" action="submit-comment.php">
    <div>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>

    <div>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>

    <div>
      <label for="comment">Comment:</label>
      <textarea id="comment" name="comment" required></textarea>
    </div>

    <button type="submit">Submit</button>
  </form>
  
  <div id="comments">
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

    // display comments
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='comment'>";
      echo "<h3>" . $row['name'] . "</h3>";
      echo "<p>" . $row['comment'] . "</p>";
      echo "<p>" . $row['created_at'] . "</p>";
      echo "</div>";
    }

    // close database connection
    mysqli_close($conn);
    ?>
  </div>
</div>
  

  <script src="script.js"></script>
</body>
</html>
