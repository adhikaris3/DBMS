<html>
    <head>
        <title>Connecting to database</title>
    </head>
    <body>
        <?php
            $con = mysqli_connect('localhost','root','');
            $db = mysqli_select_db($con, 'Database');
            if($con){
                echo 'connected to database';
            }
            else{
                die('error');
            }
        
            if($db){
                echo 'found database';
            }
            else{
                die('error. no database');
            }
        ?>
        <br />
        <br />
        <?php
            $sql = mysqli_query($con, "SELECT * FROM SuppliedBy", MYSQLI_USE_RESULT);
          
            while($row = mysqli_fetch_array($sql)){
                $username = $row['SupplierName'];
                $password = $row['ISBN'];
                
                echo 'SupplierName: ' . $username . ' ISBN: '. $password.'<br />';
            }
           
        ?>
    </body>
</html>