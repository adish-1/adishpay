<?php
 include("../common.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdishPay Home</title>
    <link rel="icon" type="image/png" href="../../images/favicon.png">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="message.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">    
</head>
<?php
 $title="Unknown Entry";
$message="You have no entry to this page.";
$link="../home/";
$linkText="GO BACK";
$headingClass="error-heading";
$iconClass="fa-solid fa-circle-xmark error-icon";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    switch($id)
    {
         case "accBlocked":
            $title="Account Blocked";
            $message="Receivers Account Is Blocked By Admin";
            $link="index.php"; 
            $headingClass = "error-heading";
            $iconClass ="fa-solid fa-user-slash error-icon";
            break;
         case "insufficientBalance":
            $title="Insufficient Balance";
            $message="your account balance is not enoguhf to do this trasaction";
            $link="index.php";
            $headingClass= "error-heading";
            $iconClass ="fa-solid fa-circle-exclamation error-icon";
            break;
        case "success":
            $title="Transaction Successfull";
            $message="your Transaction is completed ,Thank You!";
            $link="index.php";
            $headingClass = "success-heading";
            $iconClass = "fa-solid fa-circle-check success-icon";
            break;
        case "failed":
            $title="Transaction Failed";
            $message="Your transaction failed";
            $link="index.php"; 
            $headingClass = "error-heading";
            $iconClass ="fa-solid fa-circle-xmark";
        case "unknownValue":
            $title="Transaction Failed";
            $message="Enter The Values First";
            $link="index.php"; 
            $headingClass = "error-heading";
            $iconClass ="fa-solid fa-circle-xmark";
        case "pinWrong":
            $title="Transaction Failed";
            $message="Invalid PIN";
            $link="index.php"; 
            $headingClass = "error-heading";
            $iconClass ="fa-solid fa-circle-xmark";
        
    }
}
?>
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
          <div class="main-card">
        <i class="<?php echo $iconClass?>"></i>

        <h2 class="<?php echo $headingClass?>"><?php echo $title?></h2>

        <p> <?php echo $message?></p>
            
        <a href="<?php echo $link ?>"><?php echo $linkText?></a>
    </div>
   </body>
   </html>