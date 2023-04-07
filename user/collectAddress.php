<?php
require('../config.php');
include('userHeader.php');
?>
<style>
  input{
    width: 50%;
  }
</style>
<br>
<div id="page-wrapper">

<form action="collectAddress_post.php" method="POST" onsubmit="return validateForm()">
  <label for="name">Address Name:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone" required><br>

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
<script>
function validateForm() {
  var name = document.getElementById("name").value;
  var phone = document.getElementById("phone").value;
  var addrs = document.getElementById("addrs").value;
  var pincode = document.getElementById("pincode").value;
  var state = document.getElementById("state").value;
  var country = document.getElementById("country").value;
  
  var nameRegex = /^[a-zA-Z]+$/;
  var phoneRegex = /^[0-9]{10}$/;
  var pincodeRegex = /^[0-9]{6}$/;
  
  if (!nameRegex.test(name)) {
    alert("Please enter a valid name (only letters allowed)");
    return false;
  }
  
  if (!phoneRegex.test(phone)) {
    alert("Please enter a valid phone number (10 digits only)");
    return false;
  }
  
  if (!pincodeRegex.test(pincode)) {
    alert("Please enter a valid pincode (6 digits only)");
    return false;
  }
  
  return true;
}
</script>
<?php
include('userFooter.php');
?>