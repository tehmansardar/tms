<?php 
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'scare';
$db['db_name'] = 'tms';

foreach($db as $key => $value)
{

    define(strtoupper($key), $value);
}

$conn =	mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$categoryName = $_POST['categoryName'];
$sql = "INSERT INTO category (categories) VALUES('$categoryName')";
if(mysqli_query($conn,$sql)){
    echo $categoryName;
}
?>