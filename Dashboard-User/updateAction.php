<?php 
include '../Helper/ConnectionUtil.php';
use Helper\ConnectionUtil;
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("location: ../Login-Register/LoginForm.php");
}
$myId = $_SESSION['id'];

$namalengkap = $_POST['nama'];
$jk = $_POST['gender'];
$umur = $_POST['usia'];
$renamedFile = $_POST['url_image'];

if (is_uploaded_file($_FILES['image_user']['tmp_name'])) {
$target_dir = "../uploads/user/";
$target_file = $target_dir . basename($_FILES["image_user"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$renamedFile = $target_dir ."profile-user-".$myId.".".$imageFileType;
move_uploaded_file($_FILES["image_user"]["tmp_name"], $renamedFile);
}


$sql = <<<SQL
        UPDATE identitas SET 
            namalengkap = '$namalengkap',
            jeniskelamin = '$jk',
            umur = '$umur',
            url_image = '$renamedFile' 
                WHERE id_user = $myId
    SQL;

mysqli_query(ConnectionUtil::connect(), $sql);

header('location: dashboard.php');