<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    require_once '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

    $id = $_GET['id'];

    mysqli_query(ConnectionUtil::connect(), "DELETE FROM users WHERE id = $id");
    header("location:dashboard.php")
    ?>
</body>
</html>