<?php
   session_start();
   include "../common/db_conn.php";

   if(isset($_POST["submit_register"] ) && $_POST["submit_register"]=="Register"){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if($password != $confirm_password){
      $_SESSION['error_signup'] = "Password & confrim password does not match";
      header("location:../src/register.php");
      
    }else{

        $qry_check = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";

        $res_check = mysqli_query($conn,$qry_check);

        if(mysqli_num_rows($res_check)==1){
                $_SESSION['error_signup'] = "Email or Phone Already Exists";
                header("location:../src/register.php");
        } else {
                $qry = "INSERT INTO users(fname,,lname,gender,age,phone,address,email,password) 
                        VALUES('$fname','$lname','$gender','$age','$phone','$address','$email','$password')";

                $res = mysqli_query($conn,$qry);

                if(isset($res) && $res != ""){
                    $_SESSION['_signup'] = "Sign up sucessfully";
                    header("location:index.php");
                } else{
                    $_SESSION['error_signup'] = "Something went wrong";
                    header("location:../src/register.php");
                }

        }
   }

   } 


?>
