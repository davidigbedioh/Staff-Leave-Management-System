<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login page.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: login page.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM registration WHERE email ='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['firstname'] = $row['firstname'];

                $_SESSION['id'] = $row['id'];

                header("Location: My leave.php");

                exit();

            }else{

                header("Location: login page.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: login page.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: login page.php");

    exit();

}
?>