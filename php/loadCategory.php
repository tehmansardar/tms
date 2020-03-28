<?php 
function load_country(){
    $conn = mysqli_connect("localhost","root","scare","tms");

    $output = '';
    $output .= '<option value="">Category</option>';
    
    $sql = "SELECT * FROM category";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result))
    {
        // $category_id = $row["id"];
        $categories = $row["categories"];
        $output .='<option value="'.$categories.'">'.$categories.'</option>';
    }
    return $output;
}
echo load_country();
?>