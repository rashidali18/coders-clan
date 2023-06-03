<?php
    session_start();
    include "../common/db_conn.php";

    if(isset($_POST['submit_login'] ) && $_POST["submit_login"]=="Login"){

        $email = $_POST['email'];
        $password = $_POST['password'];


        $qry = "SELECT * FROM users 
                WHERE email = '$email' 
                AND password = '$password'";

        $res = mysqli_query($conn,$qry);

        if(mysqli_num_rows($res) == 1){
            $_SESSION['logged_in'] = true;
            $_SESSION['success_login'] = "Logged in successfully";
            header("location:../src/view.php");
        }
        else
        {
            $_SESSION['error_login'] = "Invalid email or password";
            header("location:../src/index.php");
        }
    }
?>