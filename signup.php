<?php

include 'connect.php';

if (isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $psw = $_POST['psw'];
  $pswr = $_POST['pswr'];

  if($psw==$pswr){
    $query = ("insert into signup values ('', '$uname', '$email', '$psw')");
    
  mysqli_query($conn, $query);

  
  
  echo
  "<script>alert('Signup Successfully');
  window.location.href ='signup.php?success';</script>";

     
  
  
  }
  else{
    
 
    echo
    "<script>alert('Password Error');
    window.location.href ='signup.php?error';</script>";
    
  }

  
}

?>


<html>
    <head><title>Sign Up</title>
    <style>
body {font-family: Arial, Helvetica, sans-serif;
        background-image: url(login.png);}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
  width:30%;
    margin-left: auto;
    margin-right: auto;
}
.container h1{
     color:  #04AA6D;
    font-size: 2.5rem;
}

.container p{
            color: darkorange;
        }

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
label{
        color: darkorange;    
        }

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>


</head>

<body bgcolor="#000">

<form action=""  method="post" autocomplete="off">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="uname" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pswr" required>
    
   
    
    

    <div class="clearfix">
        <a href="login.php">
      <button type="button" class="cancelbtn">Cancel</button></a>
      <a href="login.php"><button type="submit" class="signupbtn" name="submit">Sign Up</button></a>
    </div>
  </div>
</form>

</body>
</html>