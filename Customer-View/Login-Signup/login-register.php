<?php

$email=$_POST['email'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phnum=$_POST['phnum'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];

$conn = new mysqli('localhost','root','','test');
if($conn -> connect_error){
    die('Connection Failed: '.$conn -> connect_error);}
else{
    $stmt = $conn -> prepare("insert into registration(email, firstname, lastname, phnum, username, password, confirm)
    values(?,?,?,?,?,?,?)");
    $stmt -> bind_param("sssisss", $email, $firstname, $lastname, $phnum, $username, $password, $confirm);
    $stmt -> execute();
    echo "success";
    $stmt -> close();
    $conn -> close();
}




