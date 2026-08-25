<!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>AdishPay Message</title>
              <link rel="icon" type="image/png" href="../images/favicon.png">
              <link rel="stylesheet" href="style.css">
              <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">    
          </head>
<?php
$title="Unknown Entry";
$message="You have no entry to this page.";
$link="../login/";
$linkText="GO BACK";
$headingClass="error-heading";
$iconClass="fa-solid fa-circle-xmark error-icon";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    switch($id)
    {
         case "failedLogin":
            $title="Account Login Failed";
            $message="Invalid Username Or Password! ";
            $link="../login/";
            $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
         case "errorStmt":
            $title="Account Login Failed";
            $message=" Invalid Error Occur";
            $link="../login/"; 
           $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
        case "errorPrep":
            $title="Account Login Failed";
            $message="Invalid Error Occur";
            $link="../Login/";
            $headingClass = "error-heading";
            $iconClass = "fa-solid fa-circle-xmark error-icon";
            break;
        case "successLogin":
        ?>
        
          <body>
            <div class="success-card">
          <i class="fa-solid fa-circle-check success-icon" ></i>
          <div class="login-ring">
            </div>    
          <h1 class="success-header">Login Successful</h1>
              <p class="success-text">You will be redirected in 3 seconds.</p>
              <h3 class="thank-you">Thank you</h3>
        </div>
        <?php
            header("Refresh:3; URL=../dashboard/home/");
            exit();
    }
 }
?>
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