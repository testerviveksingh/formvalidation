<?php
$name_error = "";
$email_error = "";
$mobile_error = "";

if (isset($_POST['submit'])) {
     // Name validation
     if (empty($_POST['name'])) {
          $name_error = "Name is required";
     } else {
          $name = filterdata($_POST['name']);
          if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
               $name_error = "Only letters allowed";
          }
     }

     // Email validation
     if (empty($_POST['email'])) {
          $email_error = "Email is required";
     } else {
          $email = filterdata($_POST['email']);

          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $email_error = "Invalid email format";
          }
     }

     //Mobile validation

     if (empty($_POST['mobile'])) {
          $mobile_error = "Mobile is required";
     } else {
          $mobile = filterdata($_POST['mobile']);

          if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
               $mobile_error = "Only Numbers are allowed";
          }
     }
}

function filterdata($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Validation</title>
</head>

<body>
     <form method="post" action="">
          <label>Name</label><br>
          <input type="text" name="name" placeholder="Enter Name" value="<?php if (isset($_POST['name'])) {
                                                                                echo $_POST['name'];
                                                                           } ?>"><br>
          <p style="color:red;"> <?php echo $name_error; ?></p>

          <label>Email</label><br>
          <input type="text" name="email" placeholder="Enter Email" value="<?php if (isset($_POST['email'])) {
                                                                                echo $_POST['email'];
                                                                           } ?>"><br>
          <p style="color:red;"><?php echo $email_error; ?></p>

          <label>Mobile</label><br>
          <input type="tel" name="mobile" placeholder="Enter Mobile No" value="<?php if (isset($_POST['mobile'])) {
                                                                                     echo $_POST['mobile'];
                                                                                } ?>"><br><br>
          <p style="color:red;"><?php echo $mobile_error; ?></p>

          <input type="submit" name="submit">
     </form>

</body>

</html>