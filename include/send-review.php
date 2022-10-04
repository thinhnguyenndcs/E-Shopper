<?php 
    session_start();
    include_once('../database/connect.php');
    if (isset($_POST['review'])){
        $id = $_POST['id'];
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $review = $_POST['review'];
        echo $id ;
        echo $name ;
        echo $email ;
        echo $date ;
        echo $time ;
        echo $review ;

         $query = "INSERT INTO `reviews`( `id`, `date`, `time`, `name`, `email`, `review`) VALUES ('$id','$date','$time','$name','$email','$review ')";
        
         $insert = mysqli_query($con,$query);

    }
?>