<?php
require('include/database/db.php');
    $id = $_GET['id'];
    $check = mysqli_query($con, "select * from user where Id = '$id' ");
    $result = mysqli_fetch_assoc($check);

if($_SERVER["REQUEST_METHOD"] == "POST") {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if(empty($_POST['uname'])){ ?>
    <script>alert('Name cannot be blank')</script>
    <?php }
    elseif(empty($_POST['email'])){ ?>
    <script>alert('Email cannot be blank')</script>
    <?php }
    elseif(!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {?>
        <script>alert('Email is not valid')</script>
    <?php }
    elseif(empty($_POST['mobile'])) {?>
    <script>alert('Mobile number cannot ba blank')</script>
    <?php }
    elseif(!preg_match("/^[1-9][0-9]{10}$/", $_POST['mobile']) === 1) {?>
    <script>alert('Mobile number is not valid')</script>
    <?php }
    elseif(empty($_POST['state'])){?>
    <script>alert('Please select your state')</script>
    <?php }
    elseif(empty($_POST['city'])){?>
    <script>alert('Please select your city')</script>
    <?php }
    elseif(empty($_POST['address'])){?>
    <script>alert('Address cannot ba blank')</script>
    <?php }
    else{
        $name = $_POST['uname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $sql = "UPDATE user SET Name = '$name', Email = '$email', Mobile = '$mobile', State = '$state', City = '$city', Address = '$address' WHERE Id = '$id'";
        $query = mysqli_query($con, $sql);
        
        header("Location: index.php");
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD operation - by Ramkumar</title>
    <link rel="stylesheet" href="./css/add.css">
</head>
<body>
    <center>
        <h2>Details</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="form-control">
                    <label>Name</label><br>
                    <input type="text" id="name" class="name" name="uname" placeholder="Ramkumar G" value="<?php echo $result['Name']?>">
                </div>
        
                <div class="form-control">
                    <label>Email</label><br>
                    <input type="email" id="email" class="email" name="email" placeholder="example@gmail.com" value="<?php echo $result['Email']?>">
                </div>
        
                <div class="form-control">
                    <label>Mobile</label><br>
                    <input type="text" id="mobile" class="mobile" name="mobile" placeholder="9876543210" value="<?php echo $result['Mobile']?>">
                </div>
        
                <div class="form-control">
                    <label>State</label><br>
                    <select name="state" id="state" class="form-control" name="state" onclick="makecities(this.value)">
                        <option value="" disabled selected>Choose State</option>
                        <option value="Kerala">Kerala</option>
                        <option value="TamilNadu">Tamil Nadu</option>
                    </select>
                </div>
        
                <div class="form-control">
                    <label>City</label><br>
                    <select name="city" id="city" name="city" class="form-control">
                        <option value="" disabled selected>Choose Cite</option>
                        <option></option>
                    </select>
                </div>
        
                <div class="form-control">
                    <label for="">Address</label><br>
                    <input type="text" class="address" id="address" name="address" placeholder="Enter Your Address" value="<?php echo $result['Address']?>">
                </div>
                <div class="form-control">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
            </div>
        </form>
    </center>
    
   
</body>
</html>
<script type='text/javascript' src="city.js"></script>
<?php
include 'include/footer.php'
?>