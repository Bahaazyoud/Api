<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'animals';
$dsn = "mysql:host=$servername;dbname=$dbname";
try{
    $connection = new PDO($dsn,$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "successfully";
} catch(PDOException $e){
    echo "not successfully";
}
$id = $_POST['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$price = $_POST['price'];

try{
    
    $sql= "UPDATE animal SET name='$name' , age='$age', price='$price' WHERE id=$id";
    $stat = $connection->query($sql);
    $resultdata = array('status'=>true,'message'=>'post update successfully');
}
catch(PDOException $e){
    $resultdata = array('status'=>false,'message'=>'not update successfully');
}
echo '<br>' . json_encode($resultdata);