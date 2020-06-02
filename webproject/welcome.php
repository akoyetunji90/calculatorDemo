<?php
function add($x,$y){
    $sum = $x+$y;
    return $sum;
}

function sub($x,$y){
    $sub = $x-$y;
    return $sub;
}

function multiply($x,$y){
    $product = $x*$y;
    return $product;
}

function modulus($x,$y){
    $mod = $x%$y;
    return $mod;
}
//Establishing database connection
$serverName="localhost";
$userName="root";
$password="";
$dbname="webproject";
$conn=new mysqli($serverName,$userName,$password,$dbname);

//Checking if connected
if($conn->connect_error){
    die("can not connect to db".$conn->connection_error);
}
//Retreiving data from index page
    $number1=$_POST['number1'];
    $number2=$_POST['number2'];
    $val="'$number1','$number2'";//adding number1 and number2 to table 
    //validating input values
    if($number1==null||$number2==null){
        echo "invalid numbers";
    }
   //performing the operations on the operands and adding operation and result to table
else if(isset($_POST['add'])){
   $result= add($number1,$number2);
   echo "Sum of the two numbers gives $result";
    $val.=",'add','$result'";
    }   
else if(isset($_POST['sub'])){
    $result= sub($number1,$number2);
   echo "Subtraction of the two numbers gives $result";
    $val.=",'sub','$result'";
}
else if(isset($_POST['multiply'])){
    $result= multiply($number1,$number2);
   echo "Product of the two numbers gives $result";
    $val.=",'multiply','$result'";
}
else if(isset($_POST['modulus'])){
   $result= modulus($number1,$number2);
   echo "Modulus of the two numbers gives $result";
    $val.=",'divide','$result'";
}
//inserting into database
$sql="INSERT INTO calculator (value1,value2,operator,result)VALUES ($val)";
//checking for error
if($conn->query($sql)==true){
echo "<br>";
echo "new record added successfully";
}
else{
    echo $conn->error;
}
//$conn->close();
?>
