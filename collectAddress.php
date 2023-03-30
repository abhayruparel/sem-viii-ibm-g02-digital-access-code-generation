<?php
require('../config.php');
include('userHeader.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escape user inputs for security
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $addrs = mysqli_real_escape_string($con, $_POST['addrs']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $user_id_fk = $_SESSION['user_id'];

    // Validate pincode
    if (!preg_match('/^\d{6}$/', $pincode)) {
        echo "Invalid pincode format";
        exit();
    }

    // Insert address into database
    $sql = "INSERT INTO address (name, email, phone, addrs, pincode, state, country, user_id_fk)
        VALUES ('$name', '$email', '$phone', '$addrs', '$pincode', '$state', '$country', '$user_id_fk')";

    if (mysqli_query($con, $sql)) {
        echo "Address added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }


}
?>
<!-- user: add address screen UI overhaul. -->
<br>
<div id="page-wrapper"> 
<div id="page-wrapper">
<form action="" method="POST">
  <label for="name">Address Name:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone"><br>

  <label for="addrs">Address:</label>
  <input type="text" id="addrs" name="addrs" required><br>

  <label for="pincode">Pincode:</label>
  <input type="text" id="pincode" name="pincode" required><br>

  <label for="state">State:</label>
  <input type="text" id="state" name="state" required><br>

  <label for="country">Country:</label>
  <input type="text" id="country" name="country" required><br>


  <input type="submit" value="Submit">
</form></div>
</div>
<?php
include('userFooter.php');
?>