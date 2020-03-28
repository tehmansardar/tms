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
$output  = array();
$i = 1;
$query = 'SELECT * FROM post ORDER BY id DESC LIMIT 15';
$run = mysqli_query($conn,$query);
while($row=mysqli_fetch_array($run)){
    $date = getdate($row['date']);
        
    $output[] = [
        'id'        =>  $row["id"],
        'counter'   =>  $i++,
        'title'     =>  $row['title'],
        'category'  =>  $row['category'],
        'day'       =>  $date['mday'],
        'month'     =>  substr($date['month'],0,3),
        'year'      =>  $date['year'],
        'hours'     =>  $row['hours']

    ];
}

echo json_encode($output);
?>