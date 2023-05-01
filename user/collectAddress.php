<?php
require('../config.php');
include('userHeader.php');
?>

<br>
<div id="page-wrapper">
  <div class="col-sm-12">
    <div class="white-box">
    <h1 style="text-transform: uppercase; text-decoration: underline;">Add your address to our state of the art DIGITAL ACCESS CODE DATABASE</h1>
      <form action="collectAddress_post.php" method="POST" onsubmit="return validateForm()">
        <div class="form-group col-3">
          <label for="name">Address Name:</label>
          <input type="text" id="name" name="name" class="form-control" required><br>
        </div>
        <div class="form-group col-3">
          <label for="phone">Phone:</label>
          <input type="text" id="phone" name="phone" class="form-control" required><br>
        </div>
        <div class="form-group col-3">
          <label for="addrs">Address:</label>
          <input type="text" id="addrs" name="addrs" class="form-control" required><br>
        </div>
        <div class="form-group col-3">
          <label for="pincode">Pincode:</label>
          <input type="text" id="pincode" name="pincode" class="form-control" required><br>
        </div>
        <div class="form-group col-3">
          <label for="state">State:</label>
          <input type="text" id="state" name="state" class="form-control" required><br>
        </div>
          <div class="form-group col-3">
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" class="form-control" required><br>
          </div>

        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>
<script>
  function validateForm() {
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    var addrs = document.getElementById("addrs").value;
    var pincode = document.getElementById("pincode").value;
    var state = document.getElementById("state").value;
    var country = document.getElementById("country").value;

    var nameRegex = /^[A-Za-z]+[a-zA-z0-9\s]+$/;
    var phoneRegex = /^[0-9]{10}$/;
    var pincodeRegex = /^[0-9]{6}$/;

    if (!nameRegex.test(name)) {
      alert("Please enter a valid name: must start with an letter and must have one small letter followed by first letter.");
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