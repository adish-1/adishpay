<?php
 include("../common.php");
 $userFound=FALSE;
  $mess="";
  if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(isset($_POST['id'])){
    $receiveUser=$_POST["id"];
    $_SESSION['receiver']=$receiveUser;
    if($receiveUser==$username){
        $mess="Cant Send Money To Your Account From You";
    }
    else{
    $sql="select * from users where username=?";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"s",$receiveUser);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $receiveUser=$row['username'];
            $userFound=TRUE;
        }
        else{
             $mess=" Username Dosen't Exsist!";
        }
     }
    }
    }
    else{
        $mess="Enter a Valid Username!";
    }
  }
  else{
    $sql="select * from transaction where sender=?  order by transaction_time desc limit 6";
    $stmt=mysqli_prepare($conn,$sql);
    if($stmt){
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)==0){
             $mess="Make your First Transaction Here";
     }
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
    <link rel="stylesheet" href="style.css">
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
    <h2>Send Money</h2>
    <div class="major">
      <div class="content">
       <form method="POST">
        <input type="text" name="id" pattern[0-9a-z] required placeholder="Enter the Receivers Username">
        <input type="submit" value="search">
       </form>
       <div class="latest-receiver">
        <?php
        if($userFound)
            {?>
             <div class="receiver">
               <div class="latest-user">
                 <i class="fa-solid fa-circle-user"></i><span><?php echo htmlspecialchars($receiveUser); ?></span>
              </div>
              <a href="send.php" class="send-link">Send</a>
          </div>   
          <?php
            }
        else{ 
            if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $userId=$row['reciever'];
                ?>
          <div class="receiver">
               <div class="latest-user">
                 <i class="fa-solid fa-circle-user"></i><span><?php echo htmlspecialchars($userId); ?></span>
              </div>
             <a href="send.php?user=<?php echo urlencode($userId); ?>" class="send-link">Send</a>
          </div>
          <hr>
        <?php
            }
        }
        }?>
         <?php
          if($mess){
            ?>
             <h2><?php echo $mess;?></h2>
            <?php
          }
         ?>
       </div>
       <a href="../home/" class="back-link">GO BACK</a>
    </div>
</div>
    <h6>© 2026 AdishPay. All rights reserved.</h6>
    </body>
    </html>