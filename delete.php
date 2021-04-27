<?php
require('include/database/db.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM user WHERE Id = '$id'";
    $query = mysqli_query($con, $sql);
?>
<script type="text/javascript">
    alert("Successfully user details is delete.!");
    window.location.href='index.php';
</script>