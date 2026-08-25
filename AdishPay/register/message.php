<?php
$title="Unknown Entry";
$message="You have no entry to this page.";
$link="../register/";
$linkText="GO BACK";
$headingClass="error-heading";
$iconClass="fa-solid fa-circle-xmark error-icon";
 if(isset($_GET["id"])){
    $id=$_GET["id"];
    switch($id)
    {
         case "usernameExist":
            $title="Account Creation Failed";
            $message="  Username already exists. Make a username with your firstname and last 4 digit mobile number";
            $link="../register/";
            $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
         case "emailExist":
            $title="Account Creation Failed";
            $message="Entered email is already exist";
            $link="../register/"; 
           $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
        case "phoneExist":
            $title="Account Creation Failed";
            $message="The mobile number already exist";
            $link="../register/";
            $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
        case "accountCreated":
            $title="Account Created Successfully";
            $message="Your AdishPay account has been created successfully";
            $link="../login/";
            $headingClass = "success-heading";
            $iconClass = "fa-solid fa-circle-check success-icon";
            $linkText="LOGIN";
            break;
        case "accountCreationFailed":
            $title="Account Creation Failed";
            $message="An issue occurred. Please try again.";
            $link="../register/";
           $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
        case "valueError":
            $title="Account Creation Failed";
            $message="Values Are Not Correct.";
            $link="../register/";
            $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
    }
 }
?>
<!DOCTYPE html>S
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdishPay</title>
    <link rel="icon" type="image/png" href="../images/favicon.png">
    <link rel="stylesheet" href="message.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  </head>
<body>
     <h1 class="logo">
    <span class="adish">Adish</span><span class="pay">Pay</span>
</h1>
    <div class="main-card">
        <i class="<?php echo $iconClass?>"></i>

        <h2 class="<?php echo $headingClass?>"><?php echo $title?></h2>

        <p> <?php echo $message?></p>
            
        <a href="<?php echo $link ?>"><?php echo $linkText?></a>
    </div>
</body>
</html>
