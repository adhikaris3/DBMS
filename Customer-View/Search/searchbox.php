<html>
    <head>
        <title>Connecting to Book Search</title>
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
            $sql = mysqli_query($con, "SELECT * FROM Book", MYSQLI_USE_RESULT);
          
            while($row = mysqli_fetch_array($sql)){
                $isbn = $row['ISBN'];
                $reviews = $row['UserReviews'];
                $title = $row['Title'];
                $pubdate = $row['PublicationDate'];
                $price = $row['Price'];
    
                
                echo 'ISBN:' . $isbn . 'UserReviews: '. $reviews. 'Title: '. $title. 'PublicationDate: '. $pubdate. 'Price: '. $price.'<br />';
            }
           
        ?>
    </body>
</html>



