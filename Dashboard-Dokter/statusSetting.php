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

include '../Helper/ConnectionUtil.php';
    use Helper\ConnectionUtil;

session_start();
$myid = $_SESSION['id'];

$data = mysqli_query(ConnectionUtil::connect(), "SELECT * FROM dokters WHERE id_dokter = '$myid'");
$result = mysqli_fetch_array($data);
header('location: dashboard.php');
?>

</body>
</html>