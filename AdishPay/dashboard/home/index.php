<?php
 include("../common.php");
   //transaction_data
    $transatcionClass="transaction-amount";
   $sql="select * from transaction where sender=? or reciever=? order by transaction_time desc limit 3";
   $stmt=mysqli_prepare($conn,$sql);
   if($stmt){
      mysqli_stmt_bind_param($stmt,"ss",$username,$username);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
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
    <link rel="stylesheet" href="home.css">
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
    <div class="side-bar">
        <div class="location-text home now">
            <i class="fa-solid fa-house"></i>
            <a href="../home/">Home</a>
         </div>
         <div class="location-text">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="../transactions/">Transactions</a>
         </div>
         <div class="location-text">
            <i class="fa-solid fa-circle-user"></i>
            <a href="../profile/index.php">Profile</a>
         </div>
         <div class="location-text">
            <i class="fa-solid fa-gear"></i>
            <a href="../settings">Settings</a>
         </div>
         <div class="location-text log-out">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="../logout.php">LogOut</a>
         </div>
    </div>
    <div class="content">
       <div class="greeting-user">
           <span class="greet">Welcome Back, </span><span class="login-user"><?php echo $user;?></span> <span><i style="font-style: normal;">&#128075;</i></span>
        </div>
        <div class="account-balance">
            <h4> Total Account Balance</h4>
            <h5>Avaiable Balance</h5>
            <!--here set  a varible for account balance -->
            <span><i class="fa-solid fa-indian-rupee-sign  rupee-icon"></i> </span><span class="amount"><?php echo $balance;?></span>
         </div>
       <div class="quick-accsess">
        <a href="../send/" class="send-money">Send Money</a>
        <a href="../feedback/" class="receive-money"> FeedBacks</a>
       </div>
       <div class="latest-transaction-main">
         <h1>Latest Transaction</h1>
         <?php
         if($result){
         if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
               if($username==$row['sender'])
                  {
                     $transactionClass="send";
                     $id=$row['reciever'];
                  }
               else{
                  $transactionClass="received";
                  $id=$row['sender'];
                  }
               ?>
              <div class="latest-transaction">
              <div class="transaction-id">
                <i class="fa-solid fa-circle-user  transaction-user"></i><span><?php echo htmlspecialchars($id); ?></span>
              </div>
              <div class="<?php echo htmlspecialchars($transactionClass); ?>">
               <span><i class="fa-solid fa-indian-rupee-sign  rupee-icon"></i> </span><span><?php echo htmlspecialchars($row['amount']); ?></span>
              </div>
           </div>
           <?php
            }
         }

         else{
            ?>
            <style>
                
               </style>
            <h2>No transactions to display</h2>
            <?php
         }
         }
         else{
            ?>
            <h2>Some Error has Occured!</h2>
            <?php
         }
            ?>
       </div>
        <h6>© 2026 AdishPay. All rights reserved.</h6>
    </div><!--contetn div clossing-->
</div><!--div major-->
 
</body>
</html>
