<?php
require('include/database/db.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = $_POST['uname'];
    // $email = $_POST['email'];
    // $mobile = $_POST['mobile'];
    // $state = $_POST['state'];
    // $city = $_POST['city'];
    // $address = $_POST['address'];
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
        $sql = $con->prepare("insert into user (Name,Email,Mobile,State,City,Address) values (?,?,?,?,?,?)");
            $sql->bind_param("ssssss",$name,$email,$mobile,$state,$city,$address);
            $sql->execute();
        // $sql = mysqli_query($con, "insert into user (Name, Email, Mobile, State, City, Address) value ('$name','$email','$mobile','$state','$city','$address')");
        
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
                    <input type="text" id="name" class="name" name="uname" placeholder="Ramkumar G">
                </div>
        
                <div class="form-control">
                    <label>Email</label><br>
                    <input type="email" id="email" class="email" name="email" placeholder="example@gmail.com">
                </div>
        
                <div class="form-control">
                    <label>Mobile</label><br>
                    <input type="text" id="mobile" class="mobile" name="mobile" placeholder="9876543210">
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
                    <input type="text" class="address" id="address" name="address" placeholder="Enter Your Address">
                </div>
                <div class="form-control">
                    <input type="submit" class="btn" name="submit" value="Add">
                </div>
            </div>
        </form>
    </center>
    
   
</body>
</html>
<?php
include 'include/footer.php'
?>