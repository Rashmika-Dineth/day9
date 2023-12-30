<?php
include __DIR__."/../DB/dbcon.php";
//echo $_POST["name"];
//echo $_POST["address"];

$name= $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$id = $_GET['id'];


$phonesql = "SELECT phoneNo FROM phoneno WHERE uid = '$id' ";
$resultPhone = mysqli_query($conn,$phonesql);

if(mysqli_num_rows($resultPhone) === 1){
    $row = mysqli_fetch_assoc($resultPhone);
    $updatePhone = "UPDATE phoneno SET phoneNo = '$phone' WHERE uid = '$id'";
    mysqli_query($conn,$updatePhone);
}
else{
    $updatePhone = "INSERT INTO phoneno (phoneNo, uid) VALUES ('$phone', '$id')";
    mysqli_query($conn,$updatePhone);
}

$updateUser = "UPDATE user SET name = '$name', address= '$address' WHERE id = '$id';";


$result = mysqli_query($conn,$updateUser);

header("Location:/../day9/index.php");

?>