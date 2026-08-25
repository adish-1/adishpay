<?php 
 include("../common.php");
 if(isset($_GET['user']) && !empty($_GET['user'])){
     $_SESSION['receiver'] = htmlspecialchars($_GET['user']);
 }
 if(empty($_SESSION['receiver'])){
    header("location:../home/");
    exit();
}
$receiverId=$_SESSION['receiver'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['pin']) &&  isset($_POST['amount'])){
  $amount=$_POST['amount'];
  $pin=$_POST['pin'];
  //senders info
  $sql="select balance,pin from users where username=?";
  $stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"s",$username);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  $row=mysqli_fetch_assoc($result);
  $senderBalance=$row['balance'];
  $sendersPin=$row['pin'];
  //receivers info
  $sql="select balance,status from users where username=?";
  $stmt=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt,"s",$receiverId);
  mysqli_stmt_execute($stmt);
  $result=mysqli_stmt_get_result($stmt);
  $row=mysqli_fetch_assoc($result);
  $receiverStatus=$row['status'];
  $receiverBalance=$row['balance'];  
  //end info
  if(password_verify($pin,$sendersPin)){
  if($amount>$senderBalance){
    header("location:message.php?id=insufficientBalance");
    exit();
  }
  if($receiverStatus=="blocked"){
    header("location:message.php?id=accBlocked");
   $_SESSION['receiver']="";
    exit();
  }
  $senderBalance=$senderBalance-$amount;
  $receiverBalance=$receiverBalance+$amount;
  $sql="update users set balance=? where username=?";
  $stmt1=mysqli_prepare($conn,$sql);
  mysqli_stmt_bind_param($stmt1,"ds",$senderBalance,$username);
  $check1=mysqli_stmt_execute($stmt1);

  $sql2="update users set balance=? where username=?";
  $stmt2=mysqli_prepare($conn,$sql2);
  mysqli_stmt_bind_param($stmt2,"ds",$receiverBalance,$receiverId);
  $check2=mysqli_stmt_execute($stmt2);

  if($check1 && $check2){
    $sql="insert into transaction(sender,reciever,amount) values(?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssd",$username,$receiverId,$amount);
    mysqli_stmt_execute($stmt);
    header("location:message.php?id=success");
    $_SESSION['receiver']="";
    exit();
  }
  else{
   header("location:message.php?id=failed");
  unset($_SESSION['receiver']);
    exit();
  }


}
else{
  header("location:message.php?id=pinWrong");
  unset($_SESSION['receiver']);
    exit();
}
}
else{
  header("location:message.php?id=unknownValue");
   unset($_SESSION['receiver']);
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdishPay Home</title>
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="send.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">    
</head>
<body>
    <div class="header">
          <div class="adish-pay">
          <span class="adish">Adish</span><span class="pay">Pay</span>
          </div>
          <div class="user">
            <!--here set the user's name for the top inside span -->
         <i class="fa-solid fa-circle-user user-icon"></i>
          <span class="user-name"><?php echo htmlspecialchars($user); ?></span>
          </div>
    </div>
    <div class="major">
    <div class="content">
      <i class="fa-solid fa-circle-user icon-user"></i>
      <span class="users-name"><?php echo htmlspecialchars($receiverId); ?></span>
      <form method="POST">
          <input name="amount" type="number" inputmode="numeric" required placeholder="Enter Amount" min="1"><br>
          <input name="pin" type="password" inputmode="numeric" required placeholder="Enter Your PIN." maxlength="4" pattern="[0-9]{4}">
          <div class="send-money-button">
          <button type="submit">
                   Send
                 <i class="fa-solid fa-money-bill-transfer"></i>
                </button>
          </div>
      </form>
        <a href="index.php">Exit <i class="fa-solid fa-house"></i></a>
   </div>
  </div><!--major-->
 </body>
</html>