<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dac_normalised";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create Address table
$sql = "CREATE TABLE Address (
  address_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  address_line_1 VARCHAR(255) NOT NULL,
  address_line_2 VARCHAR(255),
  city VARCHAR(255) NOT NULL,
  state VARCHAR(255) NOT NULL,
  postal_code VARCHAR(10) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
  echo "Table Address created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
// Create User table
$sql = "CREATE TABLE User (
  user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  email_verified BOOLEAN DEFAULT FALSE,
  password VARCHAR(255) NOT NULL,
  address_id INT(6) UNSIGNED,
  address_verified BOOLEAN DEFAULT FALSE,
  role ENUM('admin', 'manager', 'user') NOT NULL,
  FOREIGN KEY (address_id) REFERENCES Address(address_id)
)";
if (mysqli_query($conn, $sql)) {
  echo "Table User created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


// Create OTP table
$sql = "CREATE TABLE OTP (
  otp_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  otp_value VARCHAR(10) NOT NULL,
  otp_type ENUM('email', 'physical') NOT NULL,
  created_at TIMESTAMP NOT NULL,
  FOREIGN KEY (user_id) REFERENCES User(user_id)
)";
if (mysqli_query($conn, $sql)) {
  echo "Table OTP created successfully";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
