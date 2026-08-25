<?php

include("../database/db.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){

    if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["phno"]) && isset($_POST["password"]) && isset($_POST["pin"]))
    {
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $email=$_POST['email'];
        $phno=$_POST['phno'];
        $pin=$_POST['pin'];
        $sql="select username,email,phno from users where username=? or email=? or phno=?";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$phno);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            if($row["username"]==$username){
               header("location:message.php?id=usernameExist");
            }
            else if($row["email"]==$email){
              header("location:message.php?id=emailExist");
            }
            else if($row["phno"]==$phno){
              header("location:message.php?id=phoneExist");
            }
         exit();
        }
        $password=password_hash($password,PASSWORD_DEFAULT);
        $pin=password_hash($pin,PASSWORD_DEFAULT);
        $sql="insert into users(name,username,email,phno,password,pin) values(?,?,?,?,?,?)";
        $stmt=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,"ssssss",$name,$username,$email,$phno,$password,$pin);
        $result=mysqli_stmt_execute($stmt);
        if($result){
            $id=mysqli_insert_id($conn);
            $acc_number=1000000+$id;
            $sql="update users set acc_number=? where id=?";
            $stmt=mysqli_prepare($conn,$sql);
            mysqli_stmt_bind_param($stmt,'si',$acc_number,$id);
            $result=mysqli_stmt_execute($stmt);
            if($result){
                header("location:message.php?id=accountCreated");
                exit();
            }
            else{
                header("location:message.php?id=accountCreationFailed");
                exit();
            }
        }
        else{
                header("location:message.php?id=accountCreationFailed");
                exit();
            }
    }
    else{
        header("location:message.php?id=valueError");
        exit();
    }
     
}