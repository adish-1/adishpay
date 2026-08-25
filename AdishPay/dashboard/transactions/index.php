<?php
 include("../common.php");

 $sql="SELECT * FROM transaction 
      WHERE sender=? OR reciever=? 
      ORDER BY transaction_time DESC";
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
    <title>AdishPay Transaction</title>
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="transaction.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">    
</head>
<body>
    <div class="header">
          <div class="adish-pay">
          <span class="adish">Adish</span><span class="pay">Pay</span>
          </div>
          <div class="user">
         <i class="fa-solid fa-circle-user user-icon"></i>
          <span class="user-name"><?php echo htmlspecialchars($user); ?></span>
          </div>
    </div>
    <div class="major">
     <div class="side-bar">
        <div class="location-text home">
            <i class="fa-solid fa-house"></i>
            <a href="../home/">Home</a>
         </div>
         <div class="location-text now">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="../transactions/">Transactions</a>
         </div>
         <div class="location-text">
            <i class="fa-solid fa-circle-user"></i>
            <a href="../profile/">Profile</a>
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
         <div class="content-head">
             <h3>Transaction History</h3>
         </div>
         <div class="transaction-table">
            <hr>
              <?php
               if(mysqli_num_rows($result) > 0){
                   while($row=mysqli_fetch_assoc($result)){
                       if($username==$row['sender'])
                        {
                           $transactionClass="send";
                           $receiver=$row['reciever'];
                           $symbol="-";
                        }
                        else{
                           $transactionClass="received";
                            $receiver=$row['sender'];
                             $symbol="+";
                        }
             ?>
            <div class="transaction-info">
               <div class="user-info">
                  <div class="transaction-user">
                     <i class="fa-solid fa-circle-user"></i><span><?php echo htmlspecialchars($receiver);?></span>
                  </div>
                 <div class="time">
                   <?php
                     echo date("d M Y • h:i A", strtotime($row['transaction_time']));
                     ?>
                 </div>
               </div>
               <div class="amount-info">
                   <i class="fa-solid fa-indian-rupee-sign"></i><span class="<?php echo $transactionClass;?>"><?php echo $symbol.htmlspecialchars($row["amount"]) ?></span> 
               </div>
            </div>
            <hr>
         <?php
           }
               }
            else{
            ?>
            <h2>No transaction history founded  </h2>
            <?php
         }
            ?>
         </div>
          <h6>© 2026 AdishPay. All rights reserved.</h6>
     </div><!--conten-div-->
   </div> <!--major class closing div-->
   
</body>
</html>