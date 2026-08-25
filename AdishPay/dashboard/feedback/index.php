<?php
include("../common.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['data'])){
    $name=$_POST['name'];
    $type=$_POST['type'];
    $data=$_POST['data'];
    $sql="insert into feedback(username,name,type,content) values(?,?,?,?)";
    $stmt=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"ssss",$username,$name,$type,$data);
    $result=mysqli_stmt_execute($stmt);
   if($result){
    echo "<script> alert('Your request has been submitted');</script>";
  }
  else{
     echo "<script> alert('Your request has not  been submitted');</script>";
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
    <div class="major">
        <h1>Feedback & Suggestion </h1>
    <div class="content">
    
       <form method="POST">
         <div class="name">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="name" pattern[a-zA-Z ] placeholder="Enter Your Name" required>
            </div>
            <div class="type">
             <i class="fa-solid fa-caret-down"></i>
              <select name="type" required>
                <option>Request</option>
                <option>Suggestions</option>
                <option>Issues</option>
                <option>Security Options</option>
              </select>
            </div>
            <div class="text-box">
                <i class="fa-solid fa-font"></i>
            <textarea cols="5" rows="6" required placeholder="detail the option" name="data"></textarea>
            </div>
         <div class="submit-button">
         <button type="submit">
            Submit
                <i class="fa-solid fa-right-to-bracket"></i>
         </button>
         </div>
         <a href="../home/">GO BACK</a>
       </form>
    </div>
    </div>
    </body>
</html>
