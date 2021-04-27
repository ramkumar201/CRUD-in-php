<?php
require('include/database/db.php');
$query = mysqli_query($con,"SELECT * FROM user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD operation - by Ramkumar</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
</head>
<body>
    <center>
        <div class="h2">
            <h2>PHP CRUD Operation</h2>
        </div>
        <table class="listTable">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>State</th>
                <th>City</th>
                <th>Address</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
                    while($result = mysqli_fetch_assoc($query)){
                ?>
            <tr>
                <td><?php echo $result['Id']?></td>
                <td><?php echo $result['Name']?></td>
                <td><?php echo $result['Email']?></td>
                <td><?php echo $result['Mobile']?></td>
                <td><?php echo $result['State']?></td>
                <td><?php echo $result['City']?></td>
                <td><?php echo $result['Address']?></td>
                <td>
                    <a href="edit.php?id=<?php echo $result['Id']?>" class="editIcon"><i class="fa fa-user-edit"></i></a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $result['Id']?>" class="deleteIcon"><i class="fa fa-trash-alt"></i></a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div>
            <input type="button" onclick="window.location.href='add.php'" class="addBtn" value="&plus; Add" />
        </div>
    </center>
</body>
</html>
<?php
require('include/footer.php');
?>