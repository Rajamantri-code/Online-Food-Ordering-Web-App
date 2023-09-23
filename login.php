<?php

session_start();
include 'connect.php';

if (isset($_POST['submit'])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

  }
  

  $uname = validate($_POST['uname']);
  $psw = validate($_POST['psw']);
  $email = $_POST['email'];

  $sql = "select * from signup where username='$uname' and password='$psw' and email='$email'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) === 1){
   $row = mysqli_fetch_assoc($result);
   if($row['username'] === $uname && $row['password'] === $psw && $row['email'] === $email){
    $_SESSION['username'] = $uname;
    $_SESSION['email'] = $email;
    header("Location: cart.php");
   }
  }
  else{
    echo "<script>alert('Username or Password is incorrect');
    window.location.href ='login.php?error';
    </script>";
    
  }


}
?>


<html>
    <head>
    <title>Login</title>
    </head>
    
<style>
        
body {font-family: Arial, Helvetica, sans-serif;
    background-image: url(login.png);}
form {border: 3px ;}

input[type=text], input[type=password],input[type=text], input[type=email] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #d02;
  box-sizing: border-box;
 
}

button { 
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  cursor: pointer;
  width: 200px;
    border: none;
    font-size: 1rem;
    
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: 200px;
  padding: 10px 18px;
  background-color: #f44336;
  padding: 14px 20px;
    border: none;
}

.signupbtn{
    border: box solid #000;
  background-color: lightcoral;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 200%;
}

.container {
  padding: 16px;
  width:30%;
    margin-left: auto;
    margin-right: auto;
}
    
    .btn1{
        padding: 20px;
    }

.container1 {
  
  width:50%;
    margin-left: auto;
    margin-right: auto;
    display:flex;
    position:relative;
}

.head{
    text-align: center;
    color:  #04AA6D;
    font-size: 2rem;
    font-family: serif;
}
    
    label{
        color: darkorange;
    }

span.psw {
  float: right;
  padding-top: 16px;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
}

.create{
  text-decoration: none;
  color:blue;
}

</style>
        
    </head>
    <body bgcolor="#000" >
        <div class="head">
    <h2>User Login Form</h2>
</div>

<form action="" method="post" autocomplete="off">
  


  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname"  id="uname" required>

    <label for="email"><b>E-mail</b></label>
    <input type="email" placeholder="Enter email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      </div>
     
      <div class="container1" >
         <div class="btn1" >
             <button type="submit" name="submit" id="submit" onclick="return welcome()"><b>Login</b></button>
          </div>
 
<div class="btn1" >
  <a href="Home.html">
      <button type="button" class="cancelbtn"><b>Cancel</b></button></a>
    </div>
    <div class="btn1" >
        <a href="signup.php"><button type="button" class="signupbtn" name="signsubmit"><b>Sign Up</b></button></a>
        </div>
  </div>


</form>




    </body>
</html>