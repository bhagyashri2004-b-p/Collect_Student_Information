<?php include("connection.php"); 

$id= $_GET['id'];
$query = "SELECT * FROM STORE where id= '$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>PHP CRUD Operations</title>

    </head>
    <body>
        <div class="container">
            <form action="" method="POST">
            <div class="title">
                Update Student Details
            </div>

            <div class="form">
                <div class="input_field">
                    <label>First Name</label>
                    <input type="text"  value="<?php  echo $result['fname']; ?>" class="input" name="fname" required>
                </div>

                <div class="input_field">
                    <label>Last Name</label>
                    <input type="text"  value="<?php  echo $result['lname']; ?>" class="input"  name="lname"  required>
                </div>

                <div class="input_field">
                    <label>Password</label>
                    <input type="password" value="<?php  echo $result['password']; ?>" class="input"  name="password"  required>
                </div>

                <div class="input_field">
                    <label>Confirm Password</label>
                    <input type="password" value="<?php  echo $result['cpassword']; ?>" class="input"  name="compassword"  required>
                </div>

                <div class="input_field">
                    <label>Gender</label>
                    <div class="custom_select">

                    <select  name="gender"  required>
                        <option value="Not selected">Select</option>

                        <option value="male" 
                            <?php
                                if($result['gender']== 'male')
                                {
                                    echo "selected";
                                }
                            ?>
                        >
                            Male</option>
                        <option value="female"
                        <?php
                                 if($result['gender']== 'female')
                                {
                                    echo "selected";
                                }
                        ?>
                        >
                        Female</option>
                    </select>
                    </div>
                </div>

                <div class="input_field">
                    <label>Email Address</label>
                    <input type="email" value="<?php  echo $result['email']; ?>" class="input"  name="email"  required>
                </div>

                <div class="input_field">
                    <label>Phone Number</label>
                    <input type="text" value="<?php  echo $result['phone']; ?>" class="input"  name="phone"  required>
                </div>


                <div class="input_field">
                    <label style="margin-right: 100px;">Caste</label>
                    <input type="radio" name="r1" value="General" required><label style="margin-left: 5px;">General</label>
                    <input type="radio" name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
                    <input type="radio" name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
                    <input type="radio" name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>
                </div>

                <div class="input_field">
                    <label>Address</label>
                    <textarea class="textarea"  name="address"  required>
                        <?php echo $result['address']; ?>
                    </textarea>
                </div>

                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox" required> 
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to terms and condition</p>
                </div>


                <div class="input_field">
                    <input type="submit" value="Update Details" class="btn"  name="update">
                </div>

            </div>

            </form>
        </div>
    </body>
</html>


<?php

    if($_POST['update'])
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $pwd=$_POST['password'];
        $cpwd=$_POST['compassword'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $caste=$_POST['r1'];


        $address=$_POST['address'];

        $query = "update store set fname='$fname',lname='$lname',password='$pwd',
        cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',caste= '$caste',
        address='$address'   WHERE id='$id'"; 
 
        
        $data = mysqli_query($conn,$query);


        if($data)
        {
            echo "<script>alert('Record Updated')</script>";

             ?>

                <meta http-equiv="refresh" content="0; url=http://localhost/crud/display.php">

             <?php
        }
        else
        {
            echo "Failed to updated";
        }
    }
?>