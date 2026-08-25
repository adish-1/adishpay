<?php
 include("../common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdishPay Profile</title>
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="profile.css">
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
         <div class="location-text ">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="../transactions/">Transactions</a>
         </div>
         <div class="location-text now">
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
          <div class="profile-container">

    <h1>My Profile</h1>

    <div class="profile-card">

        <div class="profile-top">
            <i class="fa-solid fa-circle-user profile-icon"></i>

            <h2><?php echo htmlspecialchars($user); ?></h2>

            <p>@<?php echo htmlspecialchars($username); ?></p>

            <span class="status">
                ● <?php echo htmlspecialchars($status); ?>
            </span>
        </div>
        <div class="balance-card">
            <p>Available Balance</p>
            <h2>
                <i class="fa-solid fa-indian-rupee-sign"></i>
                <?php echo htmlspecialchars($balance); ?>
            </h2>
        </div>
        <div class="account-info">
            <div class="info-item">
                <i class="fa-solid fa-envelope"></i>
                <div>
                    <span>Email</span>
                    <strong><?php echo htmlspecialchars($email); ?></strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-phone"></i>
                <div>
                    <span>Phone</span>
                    <strong><?php echo htmlspecialchars($phno); ?></strong>
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-building-columns"></i>
                <div>
                    <span>Account Number</span>
                   <strong><?php echo htmlspecialchars($accNumber); ?></strong> 
                </div>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-calendar"></i>
                <div>
                    <span>Member Since</span>
                    <strong><?php echo date("d M Y", strtotime($time)); ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>
 <h6>© 2026 AdishPay. All rights reserved.</h6>
    </div><!--content-->
    
   </div><!--major-->
   
</body>
</html>