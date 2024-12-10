
<?php
// Include the database connection file
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Insert user into the database
  $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $password);

  if ($stmt->execute()) {
    echo "Registration successful!";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - DreamMatch</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Sign Up</h1>
  <form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Register</button>
  </form>
</body>
</html>