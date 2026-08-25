<?php
 session_start();
 include("../database/db.php");
 if(isset($_POST['username']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="select * from users where username=?";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"s",$username);
        $isExecute=mysqli_stmt_execute($stmt);
        if($isExecute){
            $result=mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result)== 1){
               $row=mysqli_fetch_assoc($result);
               $hashedPassword=$row['password'];
               $user_id=$row['id'];
               if(password_verify($password,$hashedPassword))
                {
                    $_SESSION['username']=$username;
                    $_SESSION['id']=$user_id;
                    header("location:../auth/index.php?id=successLogin");
                    exit();
                }
                else{
                    header("location:../auth/index.php?id=failedLogin");
                    exit();
                }
            }
            else{
                header("location:../auth/index.php?id=failedLogin");
                exit();
            }
        }
        else{
            header("location:../auth/index.php?id=errorStmt");
            exit();
        }
    }
     else{
        header("location:../auth/index.php?id=errorPrep");
        exit();
     }
}

?>