
<?php

$q = $_GET['q'];

$link = mysqli_connect("127.0.0.1", "root", "", "null_hospital");
if(mysqli_connect_error()){
    die("Database connection failed");
}

$sql = "";
$result = "";


if ($q == "doct-sel"){
    
    $sql= "SELECT Staff.sID, name, phoneNumber FROM `Doctor` INNER JOIN `Staff` ON Staff.sID = Doctor.sID";
    $result = mysqli_query($link, $sql);
    
} else if ($q == "tech-sel") {
    
    $sql= "SELECT Staff.sID, name, phoneNumber FROM `Technician` INNER JOIN `Staff` ON Staff.sID = Technician.sID";
    $result = mysqli_query($link, $sql);
}



$result = mysqli_query($link, $sql);
    
    
while($row = mysqli_fetch_array($result)) {
    
    echo "<option>" . mysqli_real_escape_string($link, $row['sID']) . ", " . mysqli_real_escape_string($link, $row['name']) . " , " . mysqli_real_escape_string($link, $row['phoneNumber']) . "</option>";
   
}



?>
