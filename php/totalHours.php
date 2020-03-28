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

$output = null;

$query = 'SELECT * FROM post';
$run = mysqli_query($conn,$query);

while($row=mysqli_fetch_array($run)){
    
        $output = $output + $row['hours'];
}
echo $output;

?>