<?php
include("../common.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdishPay Settings</title>
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/common.css">
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
          <span class="user-name"><?php echo htmlspecialchars($user);?></span>
          </div>
    </div>
    <div class="major">
     <div class="side-bar">
        <div class="location-text home">
            <i class="fa-solid fa-house"></i>
            <a href="../home/">Home</a>
         </div>
         <div class="location-text">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <a href="../transactions/">Transactions</a>
         </div>
         <div class="location-text ">
            <i class="fa-solid fa-circle-user"></i>
            <a href="../profile/">Profile</a>
         </div>
         <div class="location-text now">
            <i class="fa-solid fa-gear"></i>
            <a href="../settings">Settings</a>
         </div>
         <div class="location-text log-out">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="../logout.php">LogOut</a>
         </div>
    </div>
    <div class="content"></div>
      <div class="manual-container">

    <h1>AdishPay User Manual</h1>
    <p class="manual-intro">
        Welcome to AdishPay. This section explains the basic features of your
        account, important security practices, and how to request changes
        or report an issue.
    </p>

    <!-- Card 1 -->
    <div class="manual-card">
        <h2> About AdishPay</h2>

        <p>
            AdishPay is a simple digital banking platform designed to help
            users manage their account information and perform basic
            financial transactions in a convenient way.
        </p>

        <ul>
            <li>View your current account balance.</li>
            <li>Send money to other registered users.</li>
            <li>View your complete transaction history.</li>
            <li>View your registered account information.</li>
            <li>Contact support through the Feedback & Support section.</li>
        </ul>

        <p>
            Always check the recipient's username and transaction amount
            carefully before confirming a money transfer.
        </p>
    </div>


    <!-- Card 2 -->
    <div class="manual-card security-card">
        <h2> Security & Account Safety</h2>

        <p>
            Your account security is important to us. AdishPay is designed
            to keep your account information protected and to prevent
            unauthorized access.
        </p>

        <ul>
            <li>
                Your password is never displayed on your profile or account pages.
            </li>

            <li>
                Passwords should be stored securely and should never be shared
                with another person.
            </li>

            <li>
                Database operations use secure prepared statements to help
                protect account operations from malicious SQL input.
            </li>

            <li>
                Your account session is checked before accessing protected
                pages.
            </li>

            <li>
                Always log out after using AdishPay on a shared or public computer.
            </li>
        </ul>

        <p class="important-note">
            <strong>Important:</strong>
            AdishPay will never ask you to reveal your password through
            the Feedback & Support section.
        </p>
    </div>


    <!-- Card 3 -->
    <div class="manual-card">
        <h2> Changing Your Account Information</h2>

        <p>
            Some account information may require verification before it can
            be changed. If you need to update information such as your name,
            phone number, email address, or other registered details, please
            submit a request through the Feedback & Support section.
        </p>

        <h3>How to request a change</h3>

        <ol>
            <li>Open the <strong>Feedback & Support</strong> section.</li>
            <li>Select the appropriate request type.</li>
            <li>Clearly mention the information you want to change.</li>
            <li>Provide the required details in the message.</li>
            <li>Submit the request.</li>
        </ol>

        <p>
            Your request will be reviewed by the AdishPay administration team.
            Additional verification may be required before making certain
            changes to your account.
        </p>

        <p class="processing-note">
            <strong>Processing time:</strong>
            Requests are normally reviewed and processed within
            <strong>5 working days</strong>.
        </p>

        <p>
            For technical problems, transaction issues, or suggestions,
            you can also use the Feedback & Support section.
        </p>
    </div>
<h6>© 2026 AdishPay. All rights reserved.</h6>
</div>
   </div>
</body>
</html>