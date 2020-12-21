<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$phonenum = $_POST['phone_number'];


if(!empty($firstname) || !empty($lastname) || !empty($email) || !empty($username) || !empty($password) || !empty($phonenum)){
    $host = 'localhost';
    $dbusername =  "root";
    $dbpassword = "";
    $dbname = "Database";
    
    //Create a conection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if(mysqli_connect_error()){
        die('Connect Error(' .mysqli_connect_errno(). ')' .mysqli_connect_error());
    }else{
        $SELECT = "SELECT email From signup Where email =? Limit 1";
        $INSERT = "INSERT Into signup (firstname, lastname, email, username, password, phone_number) values(?, ?, ?, ?, ?, ?)";
        
        //Prepare statement
        $stmt = $conn -> prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt -> execute();
        $stmt-> bind_result($email);
        $stmt-> store_result;
        $rnum = $stmt -> num_rows;
        
        if ($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssi", $firstname, $lastname, $email, $username, $password, $phonenum);
            $stmt -> execute();
            echo "New record inserted successfully.";       
        }else{
            echo "Someone already registered using this email";
        }
         $stmt->close();
         $conn->close();
    }
}else{
    echo "All field are required.";
    die();
}

?>