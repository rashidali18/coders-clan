<?php
   session_start();
   include "../common/db_conn.php";

   if(isset($_POST["submit_event"] ) && $_POST["submit_event"]=="Register"){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_name = $_POST['date_name'];
    $poster = $_POST['poster'];
    $duration = $_POST['duration'];


    $qry = "INSERT INTO events(title,description,date_name,poster,duration) 
            VALUES('$title','$description','$date_name','$poster','$duration')";

    $res = mysqli_query($conn,$qry);

    if(isset($res) && $res != ""){
        $_SESSION['success_event'] = "Sign up sucessfully";
        header("location:../src/index.php");
    } else{
        $_SESSION['error_event'] = "Something went wrong";
        header("location:../src/register.php");
    }

   }
?>
